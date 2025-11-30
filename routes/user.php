<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\PostController;
    use App\Http\Controllers\AdminController;
    //   all routes for a logged in user to create, view, edit, delete THEIR  posts


    Route::prefix("user/posts")->middleware("auth")->controller(PostController::class)->group(function(){

        Route::get("/mine", "show_user_posts")->name("user.posts.all");

        Route::get("/create", "create")->name("user.posts.create");
        
        Route::post("/create", "store")->name("user.posts.store");
    });
    
    //routes for admin
    Route::prefix("admin/users")->middleware(["auth", "must_be_admin"])->controller(AdminController::class)->group(function(){  
        Route::get("/all", "all_users")->name("admin.users.index");
        
    });


?>