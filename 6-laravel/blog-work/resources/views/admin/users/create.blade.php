@extends('admin.layout.admin_app')

@section('content')
    <div id="page-wrapper">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Users Create
                    </h1>

                    <a class="btn btn-primary" href="{{ route('user_index') }}" style="margin-bottom: 20px;">Back To User Listing</a>
                </div>
            </div>

            <form action="{{ route('user_store') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">


                        <div class="form-group">
                            <label for="">User Name</label>
                            <input type="text" class="form-control" name="username" placeholder="User Name">
                        </div>

                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" class="form-control" name="user_firstname" placeholder="First Name">
                        </div>

                         <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" name="user_lastname" placeholder="Last Name">
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                         <div class="form-group">
                            <label for="">User Image</label>
                            <input type="file" class="form-control" name="user_image" placeholder="User Image">
                        </div>



                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <label >User Role</label>
                            <select name="user_role" id="" class="form-control">
                                <option value="">User Role</option>
                                <option value="subscriber">Subscriber</option>
                                <option value="admin">Admin</option>
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
