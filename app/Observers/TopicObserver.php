<?php
/**
 * Created by PhpStorm.
 * User: machpng
 * Date: 2018/8/19
 * Time: 下午11:53
 */
namespace App\Observers;

use App\Handlers\SlugTranslateHandler;
use App\Markdown\Markdown;
use App\Models\Topic;

class TopicObserver
{
    protected $markdown;

    public function __construct(Markdown $markdown)
    {
        $this->markdown = $markdown;
    }

    public function saving(Topic $topic)
    {
        // xss 过滤
//        $topic->body = clean($topic->body, 'user_topic_body');
        // 将 markdown 格式转换成 html
        $content = $this->markdown->markdown($topic->body);
        // 生成话题摘录
        $topic->excerpt = make_excerpt(htmlspecialchars_decode($content));

        // 如果为空则将标题插入
        if (!$topic->excerpt) {
            $topic->excerpt = $topic->title;
        }

        // 如 slug 字段无内容，即使用翻译器对 title 进行翻译
        if ( ! $topic->slug) {
            $topic->slug = app(SlugTranslateHandler::class)->translate($topic->title);
        }
    }
}