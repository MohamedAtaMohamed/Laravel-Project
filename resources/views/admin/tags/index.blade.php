@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel panel-heading">
            <div class="panel-title">All Tags <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span> </div>
        </div>
        <div class="panel panel-body">
            <table class="table table-responsive">
                <thead>
                <th> Tag Name</th>
                <th>Control</th>
                </thead>
                <tbody>
                @if($tags->count() > 0)

                    @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->tag}}</td>
                            <td>
                                <a href="{{route('tags.edit',['id'=>$tag->id])}}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="{{route('tags.delete',['id'=>$tag->id])}}">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2" class="text-center">No Tags</td>
                    </tr>
                @endif

                </tbody>
            </table>
        </div>
    </div>


@stop