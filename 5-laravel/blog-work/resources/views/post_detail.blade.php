@extends('layout.app')


@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{ $post->post_title }}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{ $post->post_author }}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-tasks"></span> Posted on {{ $post->post_date }}</p>

                <hr>

                <!-- Preview Image -->
                @if ($post->post_image)
                    <img class="img-responsive" src="{{ $post->post_image }}" alt="">
                    <hr>
                @endif




                <!-- Post Content -->
                <p class="lead">
                    {{ $post->post_content }}
                </p>

                <hr>

                <!-- Blog Comments -->


                @if (Auth::user()->isUserLikeThisPost($post->post_id))
                <div class="row append-like-btn">
                    <p class="pull-right">
                        
                        <a
                        class="like"
                        href="{{ route('post_unlike', ['post_id' => $post->post_id]) }}">
                        <span class="glyphicon glyphicon-thumbs-down"
                        data-toggle="tooltip"
                        data-placement="top"
                        >
                        </span>
                            UnLike
                        </a>
                    </p>
                </div>
                @else
                <div class="row append-like-btn">
                    <p class="pull-right">
                        

                        <a
                        class="like"
                        href="{{ route('post_like', ['post_id' => $post->post_id]) }}">

                        <span class="glyphicon glyphicon-thumbs-up"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="I liked this before"
                        >
                        </span>
                            Like
                        </a>
                    </p>
                </div>

                @endif
                   
                  
               

               

                <!-- Comments Form -->
                @if (Auth::check())

                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="POST" action="{{ route('comment_store',['comment_post_id' => $post->post_id ]) }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>
                @endif
                <!-- Posted Comments -->

                <!-- Comment -->
                @if (count($post->comments) > 0)
                    
                @foreach ($post->comments as $singleComment)
                @if ($singleComment->comment_content)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="https://place-hold.it/64x64/109/fff" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{ $singleComment->user->username }}
                            <small>{{ $singleComment->comment_date }}</small>
                        </h4>
                        {{ $singleComment->comment_content }}
                    </div>
                </div>
                @endif
                    
                @endforeach
                @endif
               


            </div>

            <!-- Blog Sidebar Widgets Column -->
            @include('includes/sidebar')

        </div>
        <!-- /.row -->
    @endsection
