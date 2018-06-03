<!--using layouts\app.blade.php as a master page  -->
@extends('layouts.app')

@section('content')

    @if(count($errors) > 0)
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">

            <div class="panel-title">
                Create New Post
                <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
            </div>
        </div>
        <div class="panel-body">
            <form class="center-block" action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" placeholder="Post Title ?"  class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="featured">Featured</label>
                    <input type="file" name="featured"  class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="category">Category List</label>
                    <select id="category" class="form-control" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tags">Select Tags for Post</label>
                    <div class="form-control">
                    @foreach($tags as $tag)

                        <label><input type="checkbox" name="tags[]" value="{{$tag->id}}">{{$tag->tag}}</label>
                    @endforeach
                    </div>

                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" cols="5" rows="5" name="contents" id="content" placeholder="Content Of Post ?"></textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit"> Save </button>
                </div>


            </form>
        </div>
    </div>
@stop

@section('style')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
@stop

@section('script')

    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
    <script>
        $(document).ready(function() {
            $('#content').summernote();
        });


    </script>
@stop
