@extends("layouts.easygist")

@section("title")
    EasyGist - A place to share Good Vibes
@endsection


@section("pageheader")
    <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Welcome...</h1>
                        <span class="subheading">A place to express yourself</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section("content")
    <div class="container">
        <div class="row">
            
            <!--content -->
            <div class="col-md-9">

                @forelse ($posts as $po)
                     <!-- Post preview-->
                    <div class="post-preview">
                        <a href="{{ route('postdetail', ["id"=>$po->id]) }}">
                            <h2 class="post-title">{{$po->title}}</h2>
                            <h3 class="post-subtitle">{{$po->summary}}</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!"> {{ $po->user->name }} </a>
                            on {{ $po->created_at }}
                        </p>
                        <p class="post-meta">
                            Tag: 
                            @if (count($po->tags) > 0)
                                @foreach ($po->tags as $tag)
                                    <span class="badge text-bg-success">
                                        {{ $tag->name }}
                                    </span>
                                @endforeach

                            @else
                                <span class="badge text-bg-warning">
                                    No Tag
                                </span>
                            @endif

                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                @empty
                    <p class="alert alert-warning">
                        Sorry. No Published Post at the moment, Check Back Later
                    </p>
                @endforelse
               


                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4"><a class="btn btn-danger text-uppercase" href="#!">Older Posts →</a></div>
            </div>
            <!---end content-->
            <!--categories start -->
           <x-show-categories />
            <!--end categories-->
        </div>
    </div>

@endsection