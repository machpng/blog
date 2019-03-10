<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReplyRequest;
use App\Models\Reply;
use App\Models\User;

class RepliesController extends Controller
{
    public function store(ReplyRequest $request, Reply $reply)
    {
        // 判断是否登录 如果未登录则注册用户
        // 随机生成 头像地址
        if (!auth()->check()) {
            $user = new User();
            $user->name = $request->get('name');
            $user->avatar = '';
            $user->email = $request->get('email');
            $user->password = bcrypt(123456);
            $user->save();
        }

        $reply->content = $request->get('content');
        $reply->user_id = auth()->check() ? auth()->id() : $user->id;
        $reply->topic_id = $request->get('topic_id');
        $reply->save();

        return redirect()->to($reply->topic->link())->with(['rs' => 'success', 'msg' => 'release success']);
    }

    public function destroy(Reply $reply)
    {
        $this->authorize('destroy', $reply);
        $reply->delete();

        return redirect()->route('replies.index')->with(['rs' => 'success', 'msg' => 'release deleted']);
    }
}
