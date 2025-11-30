@extends("layouts.easygist")

@section("title")
    Easygist Dashboard - Create Post
@endsection



@section("content")
    <div class="container mb-5">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                 <div class="d-flex justify-content-between">
                    <h2> Create Post  </h2>
                    <a href="{{ route('user.posts.all') }}" class="btn btn-outline-danger">View My Posts</a>
                 </div>
                  <hr>
                 <form action="{{ route('user.posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title"> Post Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control">
                        @error("title")
                            <p class="alert alert-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="cover"> Post Cover Image</label>
                        <input type="file" name="cover_image" id="cover"  class="form-control">
                        @error("cover_image")
                            <p class="alert alert-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="summary"> Post Summary (Max of 100 characters)</label>
                        <input type="text" name="summary" id="summary" value="{{ old('summary') }}" class="form-control">
                        @error("summary")
                            <p class="alert alert-danger">{{$message}}</p>
                        @enderror
                    </div>

                     <div class="mb-3">
                        <label for="content"> Post Content </label>
                        <textarea name="content" id="content" class="form-control">{{ old('content') }}</textarea>
                        @error("content")
                            <p class="alert alert-danger">{{$message}}</p>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="category"> Post Category</label>
                        <select name="category_id" id="category" class="form-select">
                            <option value="">Select Category</option>
                            {{-- loop over all categories in db --}}
                            @foreach ($categories as $ca)
                                <option value="{{$ca->id}}">{{$ca->name}}</option>
                            @endforeach
                        </select>
                        @error("category_id")
                            <p class="alert alert-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status"> Post status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="">Do you want to publish Now? </option>
                            <option value="published">Published</option>
                            <option value="unpublished">Draft</option>
                        </select>
                        @error("status")
                            <p class="alert alert-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <button class="btn btn-primary"> Create Post </button>
                 </form>
                </div>
            </div>
    </div>
@endsection