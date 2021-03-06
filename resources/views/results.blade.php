
@extends('layouts.frontend')

@section('content')
    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">{{$search}}</h1>
        </div>
    </div>




    <div class="container-fluid">
        <div class="row medium-padding120 bg-border-color">
            <div class="container">
                <div class="col-lg-12">


                        <div class="row">
                            <div class="case-item-wrap">
                                @if($posts->count() > 0)
                                    @foreach($posts as $post)
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="case-item">
                                                <div class="case-item__thumb">
                                                    <img src="{{$post->featured}}" alt="{{$post->title}}">
                                                </div>
                                                <h6 class="case-item__title"><a href="{{route('post.single',['slug'=>$post->slug])}}">{{$post->title}}</a></h6>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h2>Not found </h2>
                                @endif

                            </div>
                        </div>





                </div>
            </div>
        </div>
    </div>

@endsection