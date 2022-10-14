@extends ('admin.layout.admin_app')

@section('content')
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <!-- <h1 class="page-header">
                    Dashboard
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Blank Page
                    </li>
                </ol> -->
                <h1 class="page-header">
                    Welcome To Admin Panel
                </h1>
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-lg-12">
                        <a href="#" class="btn btn-primary mb-2">Add Post</a>
                    </div>
                </div>
                <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Tags</th>
                    <th>Comments</th>
                    <th>Date</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <td>
                    <td>Id</td>
                    <td>Author</td>
                    <td>Title</td>
                    <td>Category</td>
                    <td>Status</td>
                    <td>Image</td>
                    <td>Tags</td>
                    <td>Comments</td>
                    <td>Date</td>
                    <td>View</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </td>
            </tbody>
        </table>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
@endsection
