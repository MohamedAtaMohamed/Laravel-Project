<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.posts.index')->with('posts',Post::all());
    }

    /**
     * Parameters Void
     * return creating new post
     * Go to store  to save it
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        // if categories is zero, can't create  post
        if($categories->count() == 0 ){

            Session::flash('danger','please add category first and then add your post ');
            return redirect()->back();

        }
        return view('admin.posts.create')->with('categories',$categories)->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $this->validate($request,[

            'title'         => 'required',
            'featured'      => 'required|image',
            'contents'       => 'required',
            'category_id'   => 'required',
            'tags'          => 'required'

        ]);


        // save the image to new directory uploads/posts with new name
        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/posts',$featured_new_name);

        $post = Post::create([

            'title'         => $request['title'],
            'featured'      => 'uploads/posts/' . $featured_new_name,
            'content'       => $request['contents'],
            'category_id'   => $request['category_id'],
            'slug'          => str_slug($request['title']),
            'user_id'       => Auth::id()

        ]);

        $post->tags()->attach($request['tags']);
        $post->save();

        Session::flash('success','Successfully Created Post ');

        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $post = Post::find($id);

        return view('admin.posts.edit')->with('post',$post)->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Update the specified post with id
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id of the post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'title'         => 'required',
            'contents'       => 'required',
            'category_id'   => 'required',
            'tags'          => 'required'
        ]);

        $post = Post::find($id);
        if($request->hasFile('featured')){
            $featured = $request->featured;

            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts',$featured_new_name);

            $post->featured = 'uploads/posts/'.$featured_new_name;

        }

        $post->title = $request['title'];
        $post->content = $request['contents'];
        $post->category_id = $request['category_id'];

        // it will delete all tags for this post and assign new tags for post as updated
        $post->tags()->sync($request['tags']);

        $post->save();

        Session::flash('success','successfully Updated the post ');

        return redirect()->route('posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =Post::find($id);

        $post->delete();

        Session::flash('success',"trash successfully ");

        return redirect()->back();

    }
    public function trashed(){

        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts',$posts);

    }

    public function kill($id){

        // search only in trashed post

        $post = Post::withTrashed()->where('id',$id)->first();
        //dd($post);
        // forceDelete => it will delete  the post  from database
        $post->forceDelete();

        Session::flash('success',' successfully Deleted Post');

        return redirect()->back();
    }

    public  function  restore($id){

        $post = Post::withTrashed()->where('id',$id)->first();

        // it will make deleted at to null
        $post->restore();

        Session::flash('success','Successfully retrieved the post ');

        return redirect()->back();
    }
}
