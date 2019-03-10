<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Markdown\Markdown;
use App\Models\Tag;
use App\Models\Topic;
use Illuminate\Http\Request;
use Auth;

class TopicsController extends Controller
{
    protected $markdown;

    public function __construct(Markdown $markdown)
    {
        $this->markdown = $markdown;
    }

    public function create()
    {
        $tags = Tag::orderBy('weight')->get();
        return view('topic', compact('tags'));
    }

    public function store(Request $request, Topic $topic)
    {
        $topic->fill($request->all());
        $topic->user_id = Auth::id() ? : 1;
        $topic->save();

        // 存入 tags 数据到中间表中
        $topic->tags()->attach($request->tags);

        return redirect($topic->link())->with(['rs' => 'success', 'msg' => 'release success']);
    }

    public function show(Request $request, Topic $topic)
    {
        // URL 矫正
        if ( ! empty($topic->slug) && $topic->slug != $request->slug) {
            return redirect($topic->link(), 301);
        }

        // markdown to html
        $topic->body = $this->markdown->markdown($topic->body);
        $topic->viewIncrement();

        $replies = $topic->replies()->with('user')->get();

        return view('topics.show', compact('topic', 'replies'));
    }

    public function edit(Topic $topic)
    {
        return view('topic', compact('topic'));
    }

    public function update(Request $request, Topic $topic)
    {
        $topic->update($request->all());

        return redirect()->route('topics.show', $topic->id)->with('success', '更新成功');
    }

    public function destroy(Topic $topic)
    {
        $topic->delete();

        return redirect()->route('index')->with('success', '成功删除');
    }

    /**
     * 上传图片
     * @param Request $request
     * @param ImageUploadHandler $uploader
     * @return array
     */
    public function uploadImage(Request $request, ImageUploadHandler $uploader)
    {
        // 初始化返回数据，默认是失败的
        $data = [
            'success'   => false,
            'msg'       => '上传失败!',
            'file_path' => ''
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->upload_file) {
            // 保存图片到本地
            $result = $uploader->save($request->upload_file, 'topics', 1, 400);
            // 图片保存成功的话
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg']       = "上传成功!";
                $data['success']   = true;
            }
        }
        return $data;
    }
}
