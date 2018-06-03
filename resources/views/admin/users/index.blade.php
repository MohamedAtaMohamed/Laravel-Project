@extends('layouts.app')

@section('content')

     <div class="panel panel-default">
         <div class="panel panel-heading">
             <div class="panel-title">All Users <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span> </div>
         </div>
             <div class="panel panel-body">
                   <table class="table table-responsive">
                       <thead>
                            <tr>

                                <th>Name</th>
                                <th>Permission </th>
                                <th>Control</th>
                            </tr>
                       </thead>
                       <tbody>
                           @if($users->count() > 0)
                               @foreach($users as $user)
                                   <tr>
                                       <td>
                                           {{$user->name}}
                                       </td>
                                       <td>
                                           @if($user->admin)
                                               <a href="{{route('users.notadmin',['id'=>$user->id])}}" class="btn btn-success">Make User</a>
                                           @else
                                               <a href="{{route('users.admin',['id'=>$user->id])}}" class="btn btn-success">Make Admin</a>
                                           @endif
                                       </td>
                                       <td>
                                           Control
                                       </td>
                                   </tr>
                               @endforeach
                           @else
                               <tr>
                                   <td colspan="4" class="text-center">No users</td>
                               </tr>
                           @endif
                       </tbody>
                   </table>
            </div>
     </div>



@stop