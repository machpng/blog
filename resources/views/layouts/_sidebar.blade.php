<aside class="col-md-3 col-sm-3 blog-aside">
    <div class="aside-widget">
        <header>
            <h3>Hot</h3>
        </header>
        <div class="body">
            <ul class="clean-list">
                @foreach($hot as $k => $v)
                    <li><a href="{{ $topic->link() }}">{{ $v->title }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="aside-widget">
        <header>
            <h3>Tags</h3>
        </header>
        <div class="body clearfix">
            <ul class="tags">
                @foreach($tag_list as $key => $tag)
                    <li><a href="javascript:void(0);" data-name="{{ $tag }}">{{ $tag }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</aside>