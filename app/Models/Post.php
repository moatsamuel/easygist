<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //set up relationship: how a single post relates with user
    public function user(){
       return $this -> belongsTo(User::class);
    }

    //set up relationship: how a single post relates with category
    public function category(){
        return $this -> belongsTo(User::class);
    }

    // set up relationship, how a single post relates with tags
    public function tags(){
        return $this->belongsToMany(Tag::class, "posts_tags");
    }

}
