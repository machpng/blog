<?php
/**
 * Created by PhpStorm.
 * User: machpng
 * Date: 2018/11/26
 * Time: 上午12:39
 */

namespace App\Models\Traits;


use App\Models\Reply;
use App\Models\Topic;
use Carbon\Carbon;
use Cache;
use DB;

trait HotTopicHelper
{
    // 用于存放临时用户数据
    protected $topics = [];

    // 配置信息
    protected $view_weight = 4; // 查看权重
    protected $reply_weight = 6; // 回复权重
    protected $pass_days = 365;    // 多少天内发表过内容
    protected $topic_number = 8; // 取出来多少用户

    // 缓存相关配置
    protected $cache_key = 'hot_topics';
    protected $cache_expire_in_minutes = 60;

    public function getHotTopics()
    {
        // 尝试从缓存中取出 cache_key 对应的数据。如果能取到，便直接返回数据。
        // 否则运行匿名函数中的代码来取出活跃用户数据，返回的同时做了缓存。
        return Cache::remember($this->cache_key, $this->cache_expire_in_minutes, function(){
            return $this->calculateHotTopics();
        });
    }

    public function calculateAndCacheHotTopics()
    {
        // 取得活跃用户列表
        $hot_topics = $this->calculateHotTopics();
        // 并加以缓存
        $this->cacheHotTopics($hot_topics);
    }

    private function calculateHotTopics()
    {
        $this->calculateTopicScore();
        // $this->calculateReplyScore();

        // 数组按照得分排序
        $topics = array_sort($this->topics, function ($topic) {
            return $topic['score'];
        });

        // 我们需要的是倒序，高分靠前，第二个参数为保持数组的 KEY 不变
        $topics = array_reverse($topics, true);

        // 只获取我们想要的数量
        $topics = array_slice($topics, 0, $this->topic_number, true);

        // 新建一个空集合
        $hot_topics = collect();

        foreach ($topics as $topic_id => $topic) {
            // 找寻下是否可以找到用户
            $topic = $this->find($topic_id);

            // 如果数据库里有该用户的话
            if ($topic) {
                // 将此用户实体放入集合的末尾
                $hot_topics->push($topic);
            }
        }

        // 返回数据
        return $hot_topics;
    }

    private function calculateTopicScore()
    {
        // 从话题数据表里取出限定时间范围（$pass_days）内的话题
        // 并且同时取出回复此话题的数量
        $topics = Topic::where('created_at', '>=', Carbon::now()->subDays($this->pass_days))->get();

        // 根据话题数量计算得分
        foreach ($topics as $topic) {
             $reply_score = $topic->reply_count * $this->reply_weight;
             $view_score = $topic->view_count * $this->view_weight;
             $this->topics[$topic->id]['score'] = $reply_score + $view_score;
        }
    }

    private function calculateReplyScore()
    {
        // 从回复数据表里取出限定时间范围（$pass_days）内，有发表过回复的用户
        // 并且同时取出用户此段时间内发布回复的数量
        $reply_users = Reply::query()->select(DB::raw('user_id, count(*) as reply_count'))
            ->where('created_at', '>=', Carbon::now()->subDays($this->pass_days))
            ->groupBy('user_id')
            ->get();
        // 根据回复数量计算得分
        foreach ($reply_users as $value) {
            $reply_score = $value->reply_count * $this->reply_weight;
            if (isset($this->topics[$value->user_id])) {
                $this->topics[$value->user_id]['score'] += $reply_score;
            } else {
                $this->topics[$value->user_id]['score'] = $reply_score;
            }
        }
    }

    private function cacheHotTopics($hot_topics)
    {
        // 将数据放入缓存中
        Cache::put($this->cache_key, $hot_topics, $this->cache_expire_in_minutes);
    }
}