@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')
    <div class="panel panel-default">
        <div class="panel-heading">
            Create a new post
        </div>

        <div class="panel-body">
            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="featured">Featured image</label>
                    <input type="file" name="featured" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category">Select a Category</label>
                    <select class="form-control" name="category_id" id="category">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags">Select tags</label>
                    @foreach($tags as $tag)
                        <div class="checkbox">
                            <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->tag }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content_form" id="content" cols="10" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Store post
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@stop

@section('scripts')

    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
    <!--<script>
        $.getScript("{{ asset('js/froala.min.js') }}", function () { $( "textarea" ).froalaEditor(); });
    </script>-->
    <script>
        $(function () {
            ClassicEditor
                    .create( document.querySelector( '#content' ))
                    .then(function(editor){})
        });
    </script>
@stop