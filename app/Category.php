<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    /*
    *it is a relationship between Posts and categories than said
     * every post have only category to belong  to it
     * every category have many posts
     * ( relationship is many to one )
    */
    public function posts()
    {
        return $this->hasMany('App\Post');

    }
}
