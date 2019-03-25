<?php
/**
 * Created by PhpStorm.
 * User: machpng
 * Date: 2019/3/25
 * Time: 下午10:48
 */
namespace App\Policies;

use App\Models\User;
use App\Models\Reply;

class ReplyPolicy extends Policy
{
    public function destroy(User $user, Reply $reply)
    {
        return $user->isAuthorOf($reply) || $user->isAuthorOf($reply->topic);
    }
}