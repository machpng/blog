<?php
/**
 * Created by PhpStorm.
 * User: machpng
 * Date: 2018/11/26
 * Time: 上午12:02
 */

namespace App\Models\Traits;

use App\Models\Tag;
use Cache;


trait TagsListHelp
{
    // 用于存放临时 tags 数据
    protected $tags = [];

    // 缓存相关配置
    protected $cache_key = 'tags_list';
    protected $cache_expire_in_minutes = 1440;

    public function getTags()
    {
        // 尝试从缓存中取出 cache_key 对应的数据。如果能取到，便直接返回数据。
        // 否则运行匿名函数中的代码来取出活跃用户数据，返回的同时做了缓存。
        return Cache::remember($this->cache_key, $this->cache_expire_in_minutes, function(){
            return $this->calculateTags();
        });
    }

    public function calculateAndCacheTags()
    {
        // 取得活跃用户列表
        $tags = $this->calculateTags();
        // 并加以缓存
        $this->cacheTags($tags);
    }

    private function calculateTags()
    {
        return Tag::orderBy('weight')->pluck('name', 'id')->toArray();
    }

    private function cacheTags($tags)
    {
        // 将数据放入缓存中
        Cache::put($this->cache_key, $tags, $this->cache_expire_in_minutes);
    }
}