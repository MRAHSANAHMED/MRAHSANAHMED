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
                    @if ($category_edit)
                    {{-- CATEGORY EDIT --}}
                    <form action="{{ route('category_update' ,['category_id' => $category_edit->cat_id]) }}" method="POST" role="form">
                        @csrf
                        @method('PUT')
                        <h3>Edit Category</h3>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" id="" placeholder="Category Name"
                                name="cat_title" value="{{ $category_edit->cat_title }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    @else
                    {{-- Create Category --}}
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
                    @endif
                    {{-- CATEGORY CREATE  --}}

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
                                        <td><a class="btn btn-primary" href="{{ route('category_edit',['category_id'=> $singleCategory->cat_id]) }}">Edit</a></td>

                                        <td>
                                            <form action="{{ route('category_delete',['category_id' => $singleCategory->cat_id]) }}"
                                                method="POST" role="form">
                                                @csrf
                                                @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
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

