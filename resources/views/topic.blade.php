@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('static/simplemde/dist/simplemde.min.css') }}">
    <link rel="stylesheet" href="{{ asset('static/chosen/chosen.min.css') }}">
@endsection

@section('content')
    <div class="container about">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body">
                    <h2 class="text-center">
                        <i class="glyphicon glyphicon-edit"></i>
                            新建话题
                    </h2>

                    <hr style="margin-top:20px">

                    <form action="{{ url('topic/store') }}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <input class="form-control" type="text" name="title" value="{{ old('title', '' ) }}"
                                   placeholder="请填写标题" required/>
                        </div>

                        <div class="form-group">
                            <select class="form-control chosen-select" multiple="multiple" name="tags[]" required data-placeholder="请选择标签" >
                                <option value="" disabled >请选择标签</option>
                                @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <textarea name="body" class="form-control" id="editor" rows="3" placeholder="请填入至少三个字符的内容。">{{ old('body', '' ) }}</textarea>
                        </div>

                        <div class="well well-sm">
                            <button type="submit" class="btn btn-primary" id="save">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 保存
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('static/simplemde/dist/simplemde.min.js') }}"></script>
    <script src="{{ asset('static/chosen/chosen.jquery.min.js') }}"></script>
    <script>
        $(function () {
            var simplemde = new SimpleMDE({
                element: $('#editor')[0],
                showIcons: ["code", "table", 'upload'],
            });

            simplemde.codemirror.on('drop', function (editor, e) {
                if (!(e.dataTransfer && e.dataTransfer.files)) {
                    alert("该浏览器不支持操作");
                    return
                }
                var dataList = e.dataTransfer.files;
                for (var i = 0; i < dataList.length; i++) {
                    if (dataList[i].type.indexOf('image') === -1 ) {
                        alert("仅支持Image上传");
                        continue
                    }
                    var formData = new FormData()
                    formData.append('upload_file', dataList[i])
                    fileUpload(formData, simplemde);
                }
            });

            simplemde.codemirror.on('paste', function (editor, e) {
                if(!(e.clipboardData && e.clipboardData.items)){
                    alert("该浏览器不支持操作");
                    return;
                }
                var dataList = e.clipboardData.items;
                for (var i = 0; i < dataList.length; i++) {
                    if (dataList[i].type.indexOf('image') === -1) {

                        continue
                    }
                    var formData = new FormData()
                    formData.append('upload_file', dataList[i].getAsFile());
                    fileUpload(formData, simplemde);

                }
            });

            $(".chosen-select").chosen({max_selected_options: 5});
        });

        function fileUpload(formData, simplemde) {
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                url: '{{ route('topics.upload_image') }}',
                type: 'POST',
                cache: false,
                data: formData,
                timeout: 5000,
                //必须false才会避开jQuery对 formdata 的默认处理
                // XMLHttpRequest会对 formdata 进行正确的处理
                processData: false,
                //必须false才会自动加上正确的Content-Type
                contentType: false,
                xhrFields: {
                    withCredentials: true
                },
                success: function (data) {
                    simplemde.value(simplemde.value() + "![](" + data.file_path + ")")
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("上传出错了")
                }
            });
        }
    </script>
@endsection