@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Search Blogs
                </h1>


                @include('dynamic.posts');


            </div>

            <!-- Blog Sidebar Widgets Column -->
            @include('includes/sidebar')

        </div>
        <!-- /.row -->

        <hr>
    @endsection
