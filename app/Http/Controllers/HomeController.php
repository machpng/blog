<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Topic;
use function foo\func;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request, $tags = '', Topic $topic, Tag $tag)
    {
        $hot = $topic->getHotTopics();
        $topic = $topic->withOrder($request->order);

        // 判断tags
        if ($tags) {
            $filter_tags = explode(',', $tags);
            $topic->whereHas('tags', function ($query) use ($filter_tags) {
                $query->whereIn('name', $filter_tags);
            });
        }

        $list = $topic->paginate(3);
        // 标签
        $tag_list = $tag->getTags();
        return view('index', compact('list', 'tags', 'hot', 'tag_list'));
    }

    public function single()
    {
        return view('single');
    }

    public function about()
    {
        return view('about');
    }


}
