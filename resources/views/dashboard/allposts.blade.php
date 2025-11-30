@extends("layouts.easygist")

@section("title")
    Easygist Dashboard - My Posts
@endsection



@section("content")
    <div class="container">
            <div class="row">
                <div class="col-md-12">
                 <div class="d-flex justify-content-between">
                    <h2>My Posts  </h2>
                    <a href="{{ route('user.posts.create') }}" class="btn btn-outline-danger">Create New Post</a>
                 </div>
                  <hr>
                    @if (session("success"))
                        <p class="alert alert-success">
                            {{ session("success") }}
                        </p>
                    @endif
                    <table class="table table-striped table-bordered border-danger table-responsive">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Post Title</th>
                                <th>Preview</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sn = 1
                            @endphp
                            @forelse (auth()->user()->posts as $po)
                                <tr>
                                    <td>{{$sn++}}</td>
                                    <td>{{ $po->title }} </td>
                                    <td> {{ $po->summary }} </td>
                                    <td> {{ $po->status }} </td>
                                    <td><a href="#" class="btn btn-danger btn-sm">Edit</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <p class="alert alert-warning">
                                            You do not have a Post Currently. Start Creating Post <a href="">Here</a>
                                        </p>
                                    </td>
                                </tr>
                            @endforelse
                            
                          
                        </tbody>
                       
                    </table>
                </div>
            </div>
        </div>
@endsection