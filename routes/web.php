<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[
   'uses'    => 'FrontEndController@index',
   'as'     =>'index'
]);

Route::get('/post/{slug}',[
    'uses'    => 'FrontEndController@single',
    'as'     =>'post.single'
]);

Route::get('/category/{id}',[
    'uses'    => 'FrontEndController@category',
    'as'     =>'category'
]);

Route::get('/results',function (){

    $posts = \App\Post::where('title','like', '%'. request('query') . '%')->get();

    return view('results')->with('categories',\App\Category::take(5)->get())
                                ->with('posts',$posts)->with('search',request('query'));
});
/*
Route::get('/test',function (){
    return App\Profile::find(1)->user;
});
*/


Auth::routes();



Route::group(['prefix'=>'admin' , 'middleware'=>'auth'], function (){

    // it is route for /admin/home/
    Route::get('/home', [
        'uses'  => 'HomeController@index',
        'as'    => 'home'
    ]);
    // it is start route for category

    Route::get('/category/create',[
        'uses'  => 'CategoriesController@create',
        'as'    => 'category.create'
    ]);
    Route::get('/category/edit/{id}',[
        'uses'  => 'CategoriesController@edit',
        'as'    => 'category.edit'
    ]);

    Route::post('/category/update/{id}',[
        'uses'  => 'CategoriesController@update',
        'as'    => 'category.update'
    ]);

    Route::get('/category/delete/{id}',[
       'uses'   => 'CategoriesController@destroy',
       'as'     => 'category.delete'
    ]);

    Route::get('/categories',[
        'uses'  => 'CategoriesController@index',
        'as'    => 'categories'
    ]);

    Route::post('/category/store',[
       'uses'   => 'CategoriesController@store',
        'as'    => 'category.store'
    ]);

    // it is end route for category

    // it is start route for posts

    Route::get('/posts',[
        'uses'  => 'PostsController@index',
        'as'    => 'posts'
    ]);


    Route::get('/post/create',[
        'uses'  => 'PostsController@create',
        'as'    => 'post.create'
    ]);

    Route::post('/post/store',[
        'uses'  => 'PostsController@store',
        'as'    => 'post.store'
    ]);
    Route::get('/post/delete/{id}',[
        'uses'  => 'PostsController@destroy',
        'as'    => 'post.delete'
    ]);
    // show trashed posts
    Route::get('/post/trashed',[
        'uses'  => 'PostsController@trashed',
        'as'    => 'post.trashed'
    ]);

    //
    Route::get('/post/edit/{id}',[
        'uses'  => 'PostsController@edit',
        'as'    => 'post.edit'
    ]);

    Route::post('/post/update/{id}',[
        'uses'  => 'PostsController@update',
        'as'    => 'post.update'
    ]);
    Route::get('/post/restore/{id}',[
        'uses'  => 'PostsController@restore',
        'as'    => 'post.restore'
    ]);

    Route::get('/post/kill/{id}',[
        'uses'  => 'PostsController@kill',
        'as'    => 'post.kill'
    ]);

    // it is end route for posts


    // start route for Tags
    Route::get('/tags',[
        'uses' => 'TagsController@index',
        'as'    => 'tags'
    ]);

    Route::get('/tags/create',[
        'uses' => 'TagsController@create',
        'as'    => 'tags.create'
    ]);

    Route::post('/tags/store',[
        'uses' => 'TagsController@store',
        'as'    => 'tags.store'
    ]);

    Route::get('/tags/edit/{id}',[
        'uses' => 'TagsController@edit',
        'as'    => 'tags.edit'
    ]);

    Route::post('/tags/update/{id}',[
        'uses' => 'TagsController@update',
        'as'    => 'tags.update'
    ]);

    Route::get('/tags/destroy/{id}',[
        'uses' => 'TagsController@destroy',
        'as'    => 'tags.delete'
    ]);

    /*end tags Route*/

    /*start route for users*/
    Route::get('/users',[
       'uses' => 'UsersController@index',
        'as'    => 'users'
    ]);

    Route::get('/users/create',[
        'uses' => 'UsersController@create',
        'as' => 'users.create'
    ]);

    Route::post('/users/store',[
        'uses' => 'UsersController@store',
        'as' => 'users.store'
    ]);

    Route::get('/users/admin/{id}',[
        'uses' => 'UsersController@admin',
        'as' => 'users.admin'
    ]);

    Route::get('/users/notadmin/{id}',[
        'uses' => 'UsersController@notadmin',
        'as' => 'users.notadmin'
    ]);

    Route::get('/user/profile',[
        'uses'      => 'ProfilesController@index',
        'as'        => 'user.profile'
    ]);

    Route::post('/user/profile/update',[
        'uses'      => 'ProfilesController@update',
        'as'        => 'users.profile.update'
    ]);


});
