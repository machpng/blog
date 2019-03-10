@extends('layouts.app')

@section('styles')
    <style>
        .topic-reply hr{
            margin-top: 16px;
            margin-bottom: 16px;
        }
        .topic-reply a{
            color: inherit;
        }
        .topic-reply meta{
            font-size: .9em;
            color: #b3b3b3;
        }
        aside.create-comment h3 {
            text-align: center;
            font-weight: normal;
            margin-bottom: 25px;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
        <div class="col-md-12 blog-main">
            <article class="blog-post">
                <div class="body">
                    <div class="text-center">
                        <h1>{{ $topic->title }}</h1>
                        <div class="meta">
                            <i class="fa fa-user"></i> {{ $topic->user->name }}
                            <i class="fa fa-calendar"></i> {{ $topic->created_at->diffForHumans() }}
                            <i class="fa fa-comments"></i><span class="data"><a href="#comments">{{ $topic->reply_count }}</a></span>
                            <i class="fa fa-eye"></i>{{ $topic->view_count }}
                        </div>
                    </div>
                    <div>
                        {!! $topic->body !!}
                    </div>
                </div>
            </article>

            {{--@auth--}}
            {{--<aside class="social-icons clearfix">--}}
                {{--<h3>Share on </h3>--}}
                {{--<a href="#"><i class="fa fa-weixin"></i></a>--}}
                {{--<a href="#"><i class="fa fa-qq"></i></a>--}}
                {{--<a href="#"><i class="fa fa-weibo"></i></a>--}}
            {{--</aside>--}}
            {{--@endauth--}}

            @if ($replies->isNotEmpty())
            <aside class="comments" id="comments">
                <hr>
                {{-- 用户回复列表 --}}
                <div class="panel panel-default topic-reply">
                    <div class="panel-body">
                        @include('topics._reply_list', ['replies' => $replies])
                    </div>
                </div>
            </aside>
            @endif

            <aside class="create-comment" id="create-comment">
                <hr>
                <h3><i class="fa fa-pencil"></i> Add Comment</h3>
                <form action="{{ route('replies.store') }}" method="POST" accept-charset="utf-8">
                    {{ csrf_field() }}
                    @guest
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="name" id="comment-name" placeholder="You Name" class="form-control input-lg">
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" id="comment-email" placeholder="Email" class="form-control input-lg">
                        </div>
                    </div>
                    @endguest
                    <textarea rows="6" name="content" id="comment-body" placeholder="Your Message" class="form-control input-lg"></textarea>
                    <input type="hidden" value="{{ $topic->id }}" name="topic_id">
                    <div class="buttons clearfix">
                        <button type="submit" class="btn btn-xlarge btn-clean-one">评论</button>
                    </div>
                </form>
            </aside>
        </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(function() {
            @if (session('rs'))
            swal("", "{{ session('msg') }}", "{{ session('rs') }}");
            @endif
        });
    </script>
@endsection