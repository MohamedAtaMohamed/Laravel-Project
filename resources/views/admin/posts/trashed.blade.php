@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel panel-heading">
            <div class="panel-title">All Posts <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span> </div>
        </div>
        <div class="panel panel-body">
            <table class="table table-responsive">
                <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Control</th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>
                            <img src="{{$post->featured}}" alt="{{$post->title}}" width="80px" height="50px">
                        </td>
                        <td>{{$post->title}}</td>
                        <td>
                            <a href="" class="btn btn-primary btn-xs">Edit</a>
                            <a href="{{route('post.restore',['id'=>$post->id])}}"
                               class="btn btn-success btn-xs">Restore
                            </a>

                            <a href="{{route('post.kill',['id'=>$post->id])}}"
                               class="btn btn-danger btn-xs">Delete
                            </a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>



@stop