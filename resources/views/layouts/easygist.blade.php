<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> @yield("title", "EasyGist-- Share your mind")</title>
        <link rel="icon" type="image/x-icon" href="/assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/styles.css" rel="stylesheet" />
        <link href="/css/custom.css" rel="stylesheet" />
    </head>
    <body>
       <!-- Navigation-->
       <nav class="navbar navbar-expand-lg bg-body-tertiary" id="mainbar">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="/">Easy<span style="font-size:15px;">❤️</span>Gist</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/">Home</a></li>
                    @guest
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('login')  }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('register')  }}">Register</a></li>
                    @endguest
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link px-lg-3 py-3 py-lg-4 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @php
                                    $names = explode(" ", auth()->user()-> name)
                                @endphp
                            Hi, {{ end($names)  }} ( {{ auth()->user()-> role  }} )
                            </a>
                            <ul class="dropdown-menu px-4">
                                <li><a class="dropdown-item" href="{{ route('user.posts.all') }}">View My Posts</a></li>
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">My Profile</a></li>
                                @if (auth()->user()-> role == "admin")
                                     <li><a class="dropdown-item" href="#">Manage Posts</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.users.index') }}">Manage Users</a></li>
                                    <li><a class="dropdown-item" href="allposts.html">Manage Categories</a></li>
                                    <li><a class="dropdown-item" href="#">Manage Tags</a></li>
                                @endif
                                <li>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button class="dropdown-item">Sign Out</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
        </nav>
        <!-- Page Header-->
        @yield("pageheader")
        <!-- Main Content-->
       
        @yield("content")
        
        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="small text-center text-muted fst-italic">Copyright &copy; Remote Class. Laravel 2025</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="/assets/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        @yield("script")
    </body>
</html>
