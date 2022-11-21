@extends('admin.layout.admin_app')

@section('content')
    <div id="page-wrapper">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Comments
                    </h1>

                </div>
            </div>
            @if (count($comments) > 0)
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Post</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Approve</th>
                                <th>Un Approve</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comments as $key => $singleComment)
                            <tr>
                                <td>{{ $singleComment->comment_id }}</td>
                                <td>{{ $singleComment->user ? $singleComment->user->user_firstname : null }}</td>
                                <td>{{ $singleComment->post ? $singleComment->post->post_title : null }}</td>
                                <td>{{ $singleComment->comment_status }}</td>
                                <td>{{ $singleComment->comment_date }}</td>
                                <td>
                                    <form method="POST" action="{{ route('comment_approve',['comment_id'=>$singleComment->comment_id]) }}">
                                        @csrf
                                        <button class="btn btn-primary">Approve</button>
                                    </form>
                                    
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('comment_unapprove',['comment_id'=>$singleComment->comment_id]) }}">
                                        @csrf
                                        <button class="btn btn-warning">Un Approve</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('comment_delete',['comment_id'=>$singleComment->comment_id]) }}">
                                        @csrf
                                        @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h2>No Record Found!</h2>
            @endif
        </div>
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
