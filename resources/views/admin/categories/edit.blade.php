<!--using layouts\app.blade.php as a master page  -->
@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">

            <div class="panel-title">
                Editing the Category {{$category->name}}
                <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
            </div>
        </div>
        <div class="panel-body">
            <form class="center-block" action="{{route('category.update',['id'=>$category->id])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">Name of Category</label>
                    <input type="text" name="name" value="{{$category->name}}" placeholder="Category Name?"  class="form-control"/>
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit"> Save </button>
                </div>


            </form>
        </div>
    </div>
@stop