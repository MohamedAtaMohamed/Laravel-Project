<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    /*
    *it is a relationship between Posts and categories than said
     * every post have only category to belong  to it
     * every category have many posts
     * ( relationship is many to one )
    */

    // allow to use function [create]  in the PostsController

    use SoftDeletes;

    protected $fillable = [
        'title','featured','category_id','content','slug','user_id'
    ];

    public function getFeaturedAttribute($featured){
        return asset($featured);
    }
    // it is variable for Trashed Post when delete post not delete from database but delete from view
    // and save it into database and you can retrieve it and also can delete using ForceDelete Function build in laravel
    //
    protected $dates = ['deleted_at'];

    /*
    it is relationship  that said this post related to this category and it is
    one to many ( one category have many posts )
    belongsTo() =>  it is one to many
    */
    public function category()
    {
        return $this->belongsTo('App\Category');

    }

    // tags ,posts === laravel create table with mean convention called (tag,post) === post_tag_table
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function user(){
        return$this->belongsTo('App\User');
    }

}
