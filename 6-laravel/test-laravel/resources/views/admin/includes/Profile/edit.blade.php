@extends('admin.app.app-admin')
@section('center-content')

    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Make Profile</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Update Profile</li>
                    </ol>
                    <a href="{{ route('profile_index') }}" class="btn btn-success d-none d-lg-block m-l-15">BACK</a>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row ">
            <!-- Column -->
            {{--  <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> 
                                    <img src="{{ asset('../asset/asset-admin/images/users/5.jpg') }}" class="img-circle"
                                        width="150" />
                                    <h4 class="card-title m-t-10">Hanna Gover</h4>
                                    <h6 class="card-subtitle">Accoubts Manager Amix corp</h6>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i
                                                    class="icon-people"></i>
                                                <font class="font-medium">254</font>
                                            </a></div>
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i
                                                    class="icon-picture"></i>
                                                <font class="font-medium">54</font>
                                            </a></div>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>  --}}
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-12 col-md-12  ">
                <div class="card ">
                    <!-- Tab panes -->  
                    <div class="card-body d-flex justify-content-around">

                    <form class="form-horizontal form-material " method="POST" action="{{ route('profile_update',['id'=> $profile->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class=" col-lg-8">Full Name</label>
                            <div class="col-lg-8">
                                <input type="text" placeholder="PROFILE NAME" class="form-control form-control-line"
                                    name="name" value="{{ $profile->name }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-8">Password</label>
                            <div class="col-lg-8">
                                <input type="password" class="form-control" name="password" placeholder="password" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-8">Contact No</label>
                            <div class="col-lg-8">
                                <input type="text" placeholder="CONTACT NUMBER" class="form-control form-control-line"
                                    name="contact" value="{{ $profile->contact }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-lg-8">Email</label>
                            <div class="col-lg-8">
                                <input type="email" placeholder="EMAIL" class="form-control form-control-line"
                                    name="email"  value="{{ $profile->email }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" class="form-control" name="image" placeholder="image">
                            @if ($profile->image)
                            <img src="{{ asset($profile->image) }} " width="100px" style="margin-top:15px;"/>
                                
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12">First Skill</label>
                            <div class="col-sm-12">
                                <select class="form-control form-control-line" name="skill">
                                <option value="">Select Skill</option>

                                    @if (count($skills) > 0)
                                        @foreach ($skills as $key => $singleSkills)
                                            <option value="{{ $singleSkills->id }}" @if($profile->skill == $singleSkills->id) selected @endif>{{ $singleSkills->title }}</option>
                                        @endforeach
                                    @endif

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Second Skill</label>
                            <div class="col-sm-12">
                                <select class="form-control form-control-line" name="skill2">
                                <option value="">Select Skill</option>

                                    @if (count($skills2) > 0)
                                        @foreach ($skills2 as $key => $singleSkills2)
                                            <option value="{{ $singleSkills2->id }}"  @if($profile->skill2 == $singleSkills2->id) selected @endif>{{ $singleSkills2->title }}</option>
                                        @endforeach
                                    @endif

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label Value="">Role</label>
                            <select class="form-control" id="" name="role">
                                <option value="admin" @if($profile->role == 'admin')selected @endif>admin</option>
                                <option value="user" @if($profile->role == 'user')selected @endif>user</option>

                            </select>
                        </div>
                    
                        <div class="form-group">
                            <label class="col-lg-8">Message</label>
                            <div class="col-lg-8">
                                <textarea rows="5" class="form-control form-control-line" name="content" value="">{{ $profile->content }}</textarea>
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success">Update Profile</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
@endsection
