@extends('admin.layout.admin_app')

@section('content')
    <div id="page-wrapper">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Users Edit
                    </h1>

                    <a class="btn btn-primary" href="{{ route('user_index') }}" style="margin-bottom: 20px;">Back To User Listing</a>
                </div>
            </div>

            <form action="{{ route('user_update',['user_id' => $user->user_id ]) }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">


                        <div class="form-group">
                            <label for="">User Name</label>
                            <input type="text" class="form-control" name="username" placeholder="User Name" value="{{ $user->username }}">
                        </div>

                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" class="form-control" name="user_firstname" value="{{ $user->user_firstname }}" placeholder="First Name">
                        </div>

                         <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" name="user_lastname" value="{{ $user->user_lastname }}" placeholder="Last Name">
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Email">
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                         <div class="form-group">
                            <label for="">User Image</label>
                            <input type="file" class="form-control" name="user_image" placeholder="User Image">
                        </div>


                        @if($user->user_image)

                        <img src="{{ asset("$user->user_image") }}" width="150"/>
                        @endif



                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <label >User Role</label>
                            <select name="user_role" id="" class="form-control">
                                <option value="">User Role</option>
                                <option value="user" @if($user->user_role == 'user')  selected @endif>User</option>
                                <option value="admin" @if($user->user_role == 'admin')  selected @endif>Admin</option>
                            </select>
                        </div>

                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
