@extends("layouts.easygist")

@section("title")
    Admin Dashboard -Manage Users
@endsection



@section("content")
    <div class="container">
            <div class="row">
                <div class="col-md-12">
                 <div class="d-flex justify-content-between">
                    <h2>Manage Users  </h2>
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
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Total Posts</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sn = 1
                            @endphp
                            @foreach ($users as $user)
                                <tr>
                                    <td> {{ $sn++ }} </td>
                                    <td> {{ $user-> name }} </td>
                                    <td> {{ $user-> email }} </td>
                                    <td> {{ $user-> role }} </td>
                                    <td> {{ $user-> status }} </td>
                                    <td> {{ count($user->posts) }} </td>
                                    <td>
                                        
                                    </td>
                                </tr>  
                            @endforeach
                            
                          
                        </tbody>
                       
                    </table>
                </div>
            </div>
        </div>
@endsection