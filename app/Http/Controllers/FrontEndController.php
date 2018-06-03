<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
        return view('index')
            ->with('categories',Category::take(5)->get())
            ->with('first_post',Post::orderBy('created_at','desc')->first())
            ->with('second_post',Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
            ->with('third_post',Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
            ->with('latest_categories', Category::orderBy('created_at','disc')->take(3)->get());
    }

    public function single($slug){



        $post = Post::where('slug',$slug)->first();

        // get all posts that less than this post and get only max of them ( previous post )
        $previous_id = Post::where('id' ,'<' , $post->id)->max('id');

        // get all posts greater than this post and get only min of them ( next post)
        $next_id = Post::where('id' ,'>' , $post->id)->min('id');

        return view('single')->with('post',$post)

            ->with('categories',Category::take(5)->get())
            ->with('next_post',Post::find($next_id))
            ->with('previous_post',Post::find($previous_id));

    }

    public function category($id){

        $category = Category::find($id);
        if($category === null){
            return redirect()->back();
        }
        return view('category')->with('category',$category)
            ->with('categories',Category::take(5)->get());

    }



}
