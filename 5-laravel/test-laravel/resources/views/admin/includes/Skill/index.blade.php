@extends('admin.app.app-admin')
@section('center-content')


<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">First skill</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">First skill</li>
                </ol>
                {{--  <button type="button" class="btn btn-success d-none d-lg-block m-l-15"> Create skill</button>  --}}
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
        
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Skill Table</h4>
                    {{--  <h6 class="card-subtitle">Add class <code>.table</code></h6>  --}}
                    {{--  @dd($firstSkill)  --}}
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>id no</th>
                                    <th>First skill</th>
                                    <th>Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($firstSkill) && count($firstSkill) > 0 )
                                    @foreach ($firstSkill as $key =>$singleFirstSkill)
                                    <tr>

                                        <td>{{ $key + 1}}</td>
                                        <td>{{ $singleFirstSkill->title }}</td>
                                        <td>@if($singleFirstSkill->image)
                                            <img src="{{ asset($singleFirstSkill->image) }}" width="100px" alt="{{$singleFirstSkill->id }}"/>
                                            {{--  @else
                                            <h4> no image</h4>  --}}
                                            @endif

                                        </td>
                                        <td><a class="label label-warning" style="border:transparent;"
                                            href="{{ route('skill_edit',[$singleFirstSkill->id]) }}">Edit</a></td>

                                        <form action="{{ route('skill_delete',[$singleFirstSkill->id]) }}" method="POST" role="form" class="form-horizontal form-material">
                                            @csrf
                                            @method('DELETE')
                                            <td><button class="label label-danger" style="border:transparent;"
                                                 type="submit">Delete</button></td>
                                        </form>
                                    </tr>
                                    @endforeach
                               
                                @endif
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           
        </div>
        <div class="col-3">
            <div class="card">
                <!-- Tab panes -->
                <div class="card-body">
                    @if ($firstSkill_edit)
                    <form action="{{ route('skill_update',['id'=> $firstSkill_edit->id]) }}" method="POST" enctype="multipart/form-data" class="form-horizontal form-material" >
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="col-md-12">Update Skill</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="add here"
                                    class="form-control form-control-line" name="title" value="{{ $firstSkill_edit->title }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Image</label>
                            <div class="col-md-12">
                                <input type="file" class="form-control" name="image" placeholder="image" >
                                @if ($firstSkill_edit->image)
                                <img src="{{ route('$firstSkill_edit->image') }}" width="100px" style="margin-top:15px;"/>
                                    
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success">Update skill</button>
                            </div>
                        </div>
                    </form>
                    @else
                    <form  action="{{ route('skill_store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal form-material">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-12">Add Skill</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="add here"
                                    class="form-control form-control-line" name="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Image</label>
                            <div class="col-md-12">
                                <input type="file" class="form-control" name="image" placeholder="image" >
                                <img src="" width="100px" style="margin-top:15px;"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success">Make skill</button>
                            </div>
                        </div>
                    </form>
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