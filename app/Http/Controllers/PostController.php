<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    // a method that will show user's own post
    public function show_user_posts(){
        
        return view("dashboard.allposts");
    }

    // a method that will show post creation form
    public function create(){
        //fetch all categories and send it to the view| eloquent | model-category
        $cats = Category::where("status", "active")->get();
        return view("dashboard.createpost", ["categories"=>$cats]);
    }
    // a method that process post form
    public function store(){
    //    dd(request());
       //validate
       $data = request()->validate([
            "title"  => "required|string|min:5|max:50",
            "cover_image"  => "required|image|max:4096",
            "summary"  => "required|string|min:10|max:100",
            "content"  => "required|string|min:10|max:5000",
            "category_id"  => "required",
            "status"  => "required"
       ]);
       // upload image
       $coverimg = request()->file("cover_image");
            $ext = $coverimg->extension();
            //generate a new filename
            $unique_filename = "easygist_".time(). ".$ext";
        $coverimg->move("./blogpost", $unique_filename);
        $data["cover_image"] = $unique_filename;
        $data["user_id"] = auth()->user()->id;
       // save to db
       $posted = Post::insert($data);
       // redirect to the users'ow post listing page
       return redirect()->route("user.posts.all")->with("success", "Post Created Successfully");
    }

    // a method that will fetch all active, published posts
    public function index(){

    }

}
