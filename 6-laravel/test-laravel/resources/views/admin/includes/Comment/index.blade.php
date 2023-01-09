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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Table Basic</li>
                </ol>
                <button type="button" class="btn btn-success d-none d-lg-block m-l-15"> Create Profile</button>
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
                    <h4 class="card-title">Basic Table</h4>
                    <h6 class="card-subtitle">Add class <code>.table</code></h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    
                                </tr>
                                {{--  <tr>
                                    <td>2</td>
                                    <td>Deshmukh</td>
                                    <td>Gaylord</td>
                                    <td>@Ritesh</td>
                                    <td><span class="label label-info">member</span> </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Sanghani</td>
                                    <td>Gusikowski</td>
                                    <td>@Govinda</td>
                                    <td><span class="label label-warning">developer</span> </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Roshan</td>
                                    <td>Rogahn</td>
                                    <td>@Hritik</td>
                                    <td><span class="label label-success">supporter</span> </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Joshi</td>
                                    <td>Hickle</td>
                                    <td>@Maruti</td>
                                    <td><span class="label label-info">member</span> </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Nigam</td>
                                    <td>Eichmann</td>
                                    <td>@Sonu</td>
                                    <td><span class="label label-success">supporter</span> </td>
                                </tr>  --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>


@endsection