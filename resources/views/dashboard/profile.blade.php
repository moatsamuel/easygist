@extends("layouts.easygist")

@section("title")
    Easygist Dashboard - Edit Profile
@endsection



@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="d-flex justify-content-between">
                <h2> My Profile  </h2>
                
                </div>
                <hr>

            <div>
            <form action="{{ route('profile.update') }}" method="post">
                @csrf
                @method("put")
                <div class="mb-3">
                    <label>Fullname</label>
                    <input type="text" name="name" class="form-control border-dark" value="{{ auth()->user()->name }}">
                    @error("name")
                        <p class="alert alert-danger">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Bio</label>
                    <input type="text" name="bio" class="form-control border-dark" value="{{ auth()->user()->bio }}">
                    @error("bio")
                        <p class="alert alert-danger">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-3" style="text-align: right;">
                    <button class="btn btn-danger">Update Profile</button>
                </div>
            </form>
            </div>
            <div>
            <h4>Change Password</h4>
            <hr>
            <form action="" method="post">
                <div class="mb-3">
                    <label>Current Password</label>
                    <input type="password" name="password" class="form-control border-dark">
                </div>
            
                <div class="mb-3">
                    <label>Choose Password</label>
                    <input type="password" name="password_confirm" class="form-control border-dark">
                </div>
                <div class="mb-3">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirm" class="form-control border-dark">
                </div>
                <div class="mb-3" style="text-align: right;">
                    <button class="btn btn-danger">Change Password</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    </div>
@endsection