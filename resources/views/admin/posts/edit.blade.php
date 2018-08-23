@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit post: {{ $post->title }}
        </div>

        <div class="panel-body">
            <form action="{{ route('post.update', ['id' => $post->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                </div>
                <div class="form-group">
                    <label for="featured">Featured image</label>
                    <input type="file" name="featured" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category">Select a Category</label>
                    <select class="form-control" name="category_id" id="category">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                @if($post->category->id == $category->id)
                                    selected
                                @endif
                            >{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags">Select tags</label>
                    @foreach($tags as $tag)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                       @foreach($post->tags as $t)
                                            @if($tag->id == $t->id)
                                                checked
                                            @endif
                                        @endforeach
                                >{{ $tag->tag }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content_form" id="content" cols="5" rows="5" class="form-control">{{ $post->content_form }}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Update post
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
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