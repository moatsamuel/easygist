<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // a method that fetches all posts and send it to homepage
    public function fetch_posts(){
        $categories  =Category::where("status", "active")->get();
        $posts = Post::where("status", "published")
                ->orderByDesc("id")
                ->get();
        return view("index", ["posts" => $posts, "categories"=>$categories]);
    }

    // a method that receives post id and get the post with the id
    public function get_post($id){
        $post = Post::findOrFail($id);
        if($post->status == "unpublished"){
            return abort(403, "Post Deleted");
        }
        
        return view("postdetail", ["post"=>$post]);

    }


}
