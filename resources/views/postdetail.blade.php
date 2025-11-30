@extends("layouts.easygist")

@section("title")
    EasyGist - {{ $post->title }}
@endsection


@section("pageheader")
    <header class="masthead" style="background-image: url('assets/img/home-bg.jpg'); max-height:100px;">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h4>{{ $post->title }}</h4>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section("content")
    <div class="container">
                <div class="row">
                      <!--content start -->
                    <div class="col-md-9">
                        <span class="subheading">{{ $post->summary }}</span>
                        <img src="/blogpost/{{ $post->cover_image }}" alt="Easygist - {{ $post->title }}" class="img-fluid">
                        <p> {{ $post->content }} </p>
                    </div>
                    <!--end content -->
               
           <!--categories start -->
               <x-show-categories />
       <!--end categories-->
                </div>
            </div>  
@endsection


