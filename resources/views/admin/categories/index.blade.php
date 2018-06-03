@extends('layouts.app')

@section('content')

     <div class="panel panel-default">
         <div class="panel panel-heading">
             <div class="panel-title">All Categories <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span> </div>
         </div>
             <div class="panel panel-body">
                   <table class="table table-responsive">
                       <thead>
                            <th>Name</th>
                            <th>Control</th>
                       </thead>
                       <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        <a href="{{route('category.edit',['id'=>$category->id])}}">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a href="{{route('category.delete',['id'=>$category->id])}}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                       </tbody>
                   </table>
            </div>
     </div>



@stop