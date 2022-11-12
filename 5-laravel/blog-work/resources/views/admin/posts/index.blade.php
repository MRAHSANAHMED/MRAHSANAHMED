
@extends('admin.layout.admin_app')

@section('content')
    <div id="page-wrapper">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Posts
                    </h1>

                    <a class="btn btn-primary" href="{{ route('post_create') }}">Create Post</a>
                </div>
            </div>
@if (count($posts) >0)
     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Data ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Date</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $key=>$singlePost )
                                 <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $singlePost->post_id }}</td>
                                    <td>{{ $singlePost->post_title }}</td>
                                    <td>{{ $singlePost->category ? $singlePost->category->cat_title : null }}</td>
                                    <td>{{ $singlePost->post_author }}</td>
                                    <td>{{ $singlePost->post_date }}</td>
                                    <td>@if ($singlePost->post_image)

                                            <img src="{{ $singlePost->post_image }}" width="100PX" />
                                        @else
                                            <h5>No Image Found!</h5>
                                        @endif
                                    </td>
                                    <td>{{ $singlePost->post_status }}</td>

                                    <td>
                                        <a class="btn btn-primary"  href="{{ route('post_edit',['post_id' => $singlePost->post_id ]) }}">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('post_delete',['post_id'=>$singlePost->post_id]) }}"
                                            method="POST">
                                        @csrf
                                        @method('DELETE')

                                            <button class="btn btn-danger" type="submit"
                                                onClick="return confirm('Are You Sure delete id = {{ $singlePost->post_id }}?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                @else
                <h2> no record !   </h2>
@endif


        </div>
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
