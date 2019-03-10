<?php

use App\Models\User;
use App\Models\Topic;

/**
 * Created by PhpStorm.
 * User: machpng
 * Date: 2018/11/12
 * Time: 上午12:08
 */

class TopicPolicy extends Policy
{
    public function update(User $user, Topic $topic)
    {
        return $user->isAuthorOf($topic);
    }

    public function destroy(User $user, Topic $topic)
    {
        return $topic->user_id == $user->id;
    }
}