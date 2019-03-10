<?php

namespace App\Models;

use App\Models\Traits\HotTopicHelper;
use Illuminate\Database\Eloquent\Model;
use DB;

class Topic extends Model
{
    use HotTopicHelper;

    protected $fillable = ['title', 'body', 'excerpt', 'slug'];

    // 获取该文章下面的标签
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'topic_tags');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function link($params = [])
    {
        return route('topics.show', array_merge([$this->id, $this->slug], $params));
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function scopeWithOrder($query, $order)
    {
        // 不同的排序，使用不同的数据读取逻辑
        switch ($order) {
            case 'recent':
                $query->recent();
                break;

            default:
                $query->recentReplied();
                break;
        }
        // 预加载防止 N+1 问题
        return $query;
    }

    public function scopeRecentReplied($query)
    {
        // 当话题有新回复时，我们将编写逻辑来更新话题模型的 reply_count 属性，
        // 此时会自动触发框架对数据模型 updated_at 时间戳的更新
        return $query->orderBy('updated_at', 'desc');
    }

    public function scopeRecent($query)
    {
        // 按照创建时间排序
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * 文章查看增加 + 1
     */
    public function viewIncrement()
    {
        return DB::update('UPDATE topics SET view_count=? WHERE id=?', [$this->view_count + 1, $this->id]);
    }
}
