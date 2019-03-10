@extends('layouts.app')
@section('styles')
    <style>
        .topic-list {
            padding-top: 36px;
        }
        .topic-list hr{
            margin: 10px 20px;
        }
        .topic-list .title {
            margin-top: 20px;
        }
        .title .stat{
            text-align: right;
            font-size: 14px;
            margin-right: 20px;
        }
        .stat i{
            margin-left: 5px;
            margin-right: 5px;
            font-size: 14px;
        }
        .tags a:hover
        .tags a:focus {
            text-decoration:none;
            background-color: #5bc0de;
        }

        .tags a:active{text-decoration:none;}
    </style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 col-sm-9 topic-list">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-pills">
                        <li class="{{ active_class( ! if_query('order', 'recent') ) }}">
                            <a href="{{ Request::url() }}?order=default">最后回复</a>
                        </li>
                        <li class="{{ active_class(if_query('order', 'recent')) }}">
                            <a href="{{ Request::url() }}?order=recent">最新发布</a>
                        </li>
                    </ul>
                </div>
                <div class="panel-body">
                    @foreach($list as $key => $topic)
                    <article class="blog-teaser">
                        <header class="title">
                            <h3><a href="{{ $topic->link() }}">{{ $topic->title }}</a></h3>
                            <div class="stat">
                                <ul>
                                    <i class="fa fa-calendar"></i>{{ $topic->created_at->diffForHumans() }}
                                    <i class="fa fa-eye"></i>{{ $topic->view_count }}
                                    <i class="fa fa-comments"></i>{{ $topic->reply_count }}
                                </ul>
                            </div>
                            <hr>
                        </header>
                        <div class="body">
                            {{ str_limit($topic->excerpt, $limit = 300, $end = '...') }}
                        </div>
                        <div class="clearfix">
                            <a href="{{ $topic->link() }}" class="btn btn-clean-one">Read more</a>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
            {{ $list->links() }}
        </div>
        @include('layouts._sidebar')
    </div>
</div>
@endsection
@section('scripts')
    <script src="https://cdn.bootcss.com/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        var tags = "{{ $tags }}";
        $(function() {
            @if (session('rs'))
            swal("{{ session('msg') }}", "", "{{ session('rs') }}");
            @endif

            $(".tags a").on('click', function () {
                var name = $(this).data('name');
                filterTags(name);
            });
        });

        function filterTags(name) {
            var url = window.location.href;
            var params = '';
            if (url.indexOf("?") != -1) {
                params = '?' + url.split("?")[1];
                url = url.split("?")[0];
            }

            if (tags) {
                if (tags.indexOf(name) != -1) {
                    url = url.replace(',' + name, '');
                    url = url.replace(name + ',', '');
                    // 两次点击为取消
                    url = url.replace(name, '');
                } else {
                    url += ',' + name;
                }
            } else {
                url += name;
            }

            window.location.href = url + params;
        }
    </script>
@endsection