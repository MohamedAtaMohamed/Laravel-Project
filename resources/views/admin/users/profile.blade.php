<!--using layouts\app.blade.php as a master page  -->
@extends('layouts.app')

@section('content')

    @include('admin.includes.errors');

    <div class="panel panel-default">
        <div class="panel-heading">

            <div class="panel-title">
                Updating Your Profile {{$user->name}}
                <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
            </div>
        </div>
        <div class="panel-body">
            <form class="center-block" action="{{route('users.profile.update')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" name="name" placeholder="User Name?" value="{{$user->name}}" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Your Email ?" value="{{$user->email}}" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="password" placeholder="Your New Password ?"  class="form-control"/>
                </div>



                <div class="form-group">
                    <label for="avatar">User Image</label>
                    <input type="file" name="avatar"   class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="facebook">Facebook profile link</label>
                    <input type="text" name="facebook" value="{{$user->profile->facebook}}" placeholder="Facebook Profile ?"  class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="youtube">Youtube Profile Link Name</label>
                    <input type="text" name="youtube" value="{{$user->profile->youtube}}" placeholder="Youtube Profile ?"  class="form-control"/>
                </div>


                <div class="form-group">
                    <label for="about">Your Description </label>
                    <textarea  id="about" name="about" class="form-control"> {{$user->profile->about}}</textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit"> Save </button>
                </div>


            </form>
        </div>
    </div>
@stop
