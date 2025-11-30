<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    
    // a method to show admin all users
    public function all_users(){
        $users = User::all();
        return view("dashboard.allusers", ["users"=>$users]);
    }
    // a method to activate and deactivate a user


    //a method that helpadmin to favorite and unfavorite a post
    // a method that shows an admin a detail about a post
    //a method to unpublish a post



}
