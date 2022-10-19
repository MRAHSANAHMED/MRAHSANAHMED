
@extends('layout.app')

@section('content')

<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>
            @if(count($posts)>0)
            @foreach($posts as $key =>$singlePost)
            <!-- First Blog Post -->
            <h2>
                <a href="{{ route('post_detail', ['post_id'=> $singlePost->post_id]) }}">{{ $singlePost->post_title }}</a>
            </h2>
            <p class="lead">
                by <a href="index.php">{{ $singlePost->post_author }}</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $singlePost->created_at }}</p>
            <hr>
            <img class="img-responsive" src="http://placehold.it/900x300" alt="">
            <hr>
            <p>{{ $singlePost->post_content }}</p>
            {{-- <a class="btn btn-primary" href="/post/{{ $singlePost->post_id }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> --}}
            <a class="btn btn-primary"
                            href="{{ route('post_detail', ['post_id' => $singlePost->post_id]) }}">Read More <span
                                class="glyphicon glyphicon-chevron-right"></span></a>
            <hr>
@endforeach
@endif
            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        @include('includes/sidebar')

    </div>
    <!-- /.row -->

    <hr>
@endsection
