<?php

namespace App\Markdown;
/**
 * Created by PhpStorm.
 * User: machpng
 * Date: 2018/8/16
 * Time: 下午11:59
 */

class Markdown
{
    protected $parser;

    public function __construct(Parser $parser)
    {
        $this->parser = $parser;
    }

    public function markdown($text)
    {
        return $this->parser->makeHtml($text);
    }
}