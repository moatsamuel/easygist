<?php

namespace App\Http\Controllers\Easygist;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // a method that shows the form for profile update 
    public function show_profile(){
        return view("dashboard.profile");
    }

    public function update(Request $request){
        //dd($request);
        // validate
        $request->validate([
            "name"  => ["required", "min:3"],
            "bio"   => "required|min:10|max:100"
        ], [
            "bio.required" => "Oga tell us small line about you",
            "bio.min" => "Oga that line too short",
            "bio.max" => "Oga your line too long. ",
        ]);
        // retrieve the fields 
        $name = $request->name;
        $bio = $request->bio;
        //retrieve the user id
        $user_id = auth()->user()->id;
        // update in db: add bio to fillable in our method
        $user = User::find($user_id);
        $user->name = $name;
        $user->bio = $bio;
        $user ->save();
        //return back with message
        return redirect()->back()->with("success", "Profile Updated");
    }


}
