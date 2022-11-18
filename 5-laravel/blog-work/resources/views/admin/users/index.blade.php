@extends('admin.layout.admin_app')

@section('content')
    <div id="page-wrapper">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Users
                    </h1>

                    <a class="btn btn-primary" href="{{ route('user_create'); }}">Create User</a>
                </div>
            </div>
            @if (count($users) > 0)
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $users as $key => $singleUser )
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $singleUser->user_firstname }}</td>
                                <td>{{ $singleUser->user_lastname }}</td>
                                <td>{{ $singleUser->email }}</td>
                                <td>
                                    @if($singleUser->user_image)
                                    <img src="{{ asset($singleUser->user_image) }}" width="100"/>
                                    @else
                                    <p>No Image Found!</p>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('user_edit',['user_id' => $singleUser->user_id]) }}">Edit</a>
                                </td>
                                <td>
                                   @if( auth()->id() != $singleUser->user_id)

                                   <form method="POST" action="{{ route('user_delete',['user_id' => $singleUser->user_id]) }}">
                                        @csrf
                                        @method("DELETE")
                                       <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                   
                                    @else
                                    <p style="color:red;">when Login can't Allowed delete</p>
                                    @endif
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
