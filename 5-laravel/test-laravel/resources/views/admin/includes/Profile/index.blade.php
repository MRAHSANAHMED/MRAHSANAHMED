@extends('admin.app.app-admin')
@section('center-content')


    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Table Basic</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin_index') }}">Home</a></li>
                        <li class="breadcrumb-item active">PROFILES</li>
                    </ol>
                    <a type="button" class="btn btn-success d-none d-lg-block m-l-15" href="{{ route('profile_create') }}"> Make Profile</a>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">PROFILES</h4>
                        {{--  <h6 class="card-subtitle">Add class <code>.table</code></h6>  --}}
                        @if (count($profile) > 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Profile ID</th>
                                            <th>Name</th>
                                            <th>Contact</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Skill</th>
                                            <th>Skill2</th>
                                            <th>Image</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($profile as $key => $singleProfile)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $singleProfile->id }}</td>
                                                <td>{{ $singleProfile->name }}</td>
                                                <td>{{ $singleProfile->contact }}</td>
                                                <td>{{ $singleProfile->email }}</td>
                                                <td><span class="label label-info">{{ $singleProfile->role }}</span>
                                                </td>
                                                <td><span class="label label-inverse">{{ (!empty($singleProfile->firstSkill)) ? $singleProfile->firstSkill->title :  '---'}}</span>
                                                </td>
                                                <td><span class="label label-inverse">{{ (!empty($singleProfile->secondSkill)) ? $singleProfile->secondSkill->title :  '---'}}</span>
                                                </td>
                                                <td>
                                                    @if ($singleProfile->image)
                                                    <img class="img-responsive" src="{{ asset($singleProfile->image) }}" width="80PX" alt="{{ $singleProfile->id }}">
                                                        
                                                    @else
                                                        <h5 class="breadcrumb-item active">no image</h5>
                                                        
                                                    @endif
                                                </td>
                                                <td><button class="label label-warning" style="border:transparent;"
                                                        type="submit" herf="">Edit</button></td>


                                                <form method="Post"
                                                    action="{{ route('profile_delete', ['id' => $singleProfile->id]) }}">
                                                    @csrf
                                                    @method('DELETE')

                                                    <td><button class="label label-danger" style="border:transparent;"
                                                            type="submit">Delete</button></td>
                                                </form>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>


@endsection
