@extends("layouts.easygist")

@section("title")
    EasyGist - Register and start sharing
@endsection


@section("pageheader")
    <header class="masthead" style="background-image: url('assets/img/about-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>Register here.</h1>
                        <span class="subheading">complete the form below to create an account.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section("content")
    <div class="container">
        <div class="row ">
            <div class="col-md-6 offset-md-3">
                <p>Do you love writing? Fill out the form below to create an account and start blogging!</p>
                <div class="my-5">
                    
                    <form action="{{ route('register.store') }}" method="post">
                        @csrf
                        <div class="form-floating">
                            <input class="form-control" id="name" type="text" placeholder="Enter your name..."  name="name" value="{{ old('name') }}" />
                            <label for="name">Name</label>
                            @error("name")
                                <p class="alert alert-warning">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="email" type="email" placeholder="Enter your email..."  name="email" value="{{ old('email') }}" />
                            <label for="email">Email address</label>
                            @error("email")
                                <p class="alert alert-warning">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="password" type="password" placeholder="Enter your Password" name="password" />
                            <label for="password">Password</label>
                            @error("password")
                                <p class="alert alert-warning">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="form-floating">
                            <input class="form-control" id="password_confirmation" type="password" placeholder="Confirm your Password" name="password_confirmation" />
                            <label for="password_confirmation">Confirm Password</label>
                            @error("password_confirmation")
                                <p class="alert alert-warning">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        
                        <br />
                        <!-- Submit Button-->
                        <button class="btn btn-danger col-12 text-uppercase" id="submitButton" type="submit">REGISTER</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection