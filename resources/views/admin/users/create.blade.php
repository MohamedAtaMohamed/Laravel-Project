<!--using layouts\app.blade.php as a master page  -->
@extends('layouts.app')

@section('content')

    @include('admin.includes.errors');

    <div class="panel panel-default">
        <div class="panel-heading">

            <div class="panel-title">
                Create New User
                <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
            </div>
        </div>
        <div class="panel-body">
            <form class="center-block" action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" name="name" placeholder="User Name?"  class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="name">Email Name</label>
                    <input type="email" name="email" placeholder="Your Email ?"  class="form-control"/>
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit"> Save </button>
                </div>


            </form>
        </div>
    </div>
@stop
