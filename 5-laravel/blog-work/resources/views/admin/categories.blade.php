@extends('admin.layout.admin_app')

@section('content')
    <div id="page-wrapper">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Categories
                    </h1>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    {{-- CATEGORY CREATE  --}}
                    <form action="{{ route('category_store') }}" method="POST" role="form">
                        @csrf
                        <h3>Insert Category</h3>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" id="" placeholder="Category Name"
                                name="cat_title">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Sno</th>
                                <th>Category Id</th>
                                <th>Category Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (count($categories) > 0)
                                @foreach ($categories as $key => $singleCategory)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $singleCategory->cat_id }}</td>
                                        <td>{{ $singleCategory->cat_title }}</td>
                                        <td><a class="btn btn-primary">Edit</a></td>
                                        <td><a class="btn btn-danger">Delete</a></td>
                                    </tr>
                                @endforeach
                            @else
                                <h2>No Record Found</h2>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection

