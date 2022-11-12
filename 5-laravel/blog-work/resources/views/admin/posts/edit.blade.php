@extends('admin.layout.admin_app')

@section('content')
    <div id="page-wrapper">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Edit Post
                    </h1>
                </div>
            </div>


            <form action="{{ route('post_update',['post_id' => $post->post_id]) }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Post Category</label>
                            <select name="post_category_id" id="" class="form-control">
                                <option value="">Select Category</option>
                                @if (count($categories) > 0)
                                @foreach ($categories as $key =>$singleCategories )
                                <option value="{{ $singleCategories->cat_id }}">{{ $singleCategories->cat_title }}
                                </option>
                                @endforeach

                                @endif


                            </select>
                        </div>


                        <div class="form-group">
                            <label for="">Post Title</label>
                            <input type="text" class="form-control" name="post_title" placeholder="Post Title" value="{{ $post->post_title }}">
                        </div>

                        <div class="form-group">
                            <label for="">Post Author</label>
                            <input type="text" class="form-control" name="post_author" placeholder="Post Author" value="{{ $post->post_author }}">
                        </div>

                        <div class="form-group">
                            <label for="">Post Date</label>
                            <input type="date" class="form-control" name="post_date" placeholder="Post Date" value="{{ $post->post_date }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="">Post Image</label>
                            <input type="file" class="form-control" name="post_image" placeholder="Post Image">
                            @if($post->post_image)
                            <img src = "{{ asset($post->post_image) }}" width="100px" style="margin-top:15px" />
                            @endif

                        </div>



                        <div class="form-group">
                            <label for="">Post Tags</label>
                            <input type="text" class="form-control" name="post_tags" placeholder="Post Tags" value="{{ $post->post_tags }}">
                        </div>

                        <div class="form-group">
                            <label>Post Status</label>
                            <select name="post_status" id="" class="form-control">
                                <option value="">Post Status</option>
                                <option value="publish" @if($post->post == 'publish') selected @endif>Publish</option>
                                <option value="draft" @if($post->post == 'draft') selected @endif>Draft</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="">Post Content</label>
                            <textarea name="post_content" id="" cols="30" rows="0" class="form-control">value="{{ $post->post_content }}"</textarea>
                        </div>


                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
