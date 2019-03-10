<?php
/**
 * Created by PhpStorm.
 * User: machpng
 * Date: 2018/12/16
 * Time: 下午11:06
 */

namespace App\Observers;


use App\Models\Reply;

class ReplyObserver
{
    public function created(Reply $reply)
    {
        $reply->topic->increment('reply_count', 1);
    }

    public function creating(Reply $reply)
    {
        $reply->content = clean($reply->content, 'uset_topic_body');
    }

    public function deleted(Reply $reply)
    {
        $reply->topic->decrement('reply_count', 1);
    }
}