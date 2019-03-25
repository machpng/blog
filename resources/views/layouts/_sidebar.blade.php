<aside class="col-md-3 col-sm-3 blog-aside">
    <div class="aside-widget">
        <header>
            <h3>Hot</h3>
        </header>
        <div class="body">
            <ul class="clean-list">
                @foreach($hot as $k => $topic)
                    <li><a href="{{ $topic->link() }}">{{ $topic->title }}</a></li>
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
                    <li><a href="javascript:void(0);" data-name="{{ $tag }}" class="{{ str_contains($tags, $tag) ? 'selected' : '' }}">{{ $tag }}</a></li>
                @endforeach
                {{ str_is('a', 'aaaa') }}
            </ul>
        </div>
    </div>
</aside>