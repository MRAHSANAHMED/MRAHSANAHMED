@if (count($posts) > 0)
    @foreach ($posts as $key => $singlePost)


    <!-- First Blog Post -->
    <h2>
        <a href="{{ route('post_detail', ['post_id' => $singlePost->post_id] ) }}">{{ $singlePost->post_title }}</a>
    </h2>
    <p class="lead">
        category: <a href="index.php">{{ $singlePost->category ? $singlePost->category->cat_title : null }}</a>
    </p>

    <p class="lead">
        by <a href="index.php">{{ $singlePost->post_author }}</a>
    </p>

    <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $singlePost->created_at }}</p>

    <hr>

    <img class="img-responsive" src="" alt="">

    <hr>

    <p</p>

    {{-- <a class="btn btn-primary" href="/post/{{ $singlePost->post_id }}">Read More <span
                           class="glyphicon glyphicon-chevron-right"></span></a> --}}

    <a class="btn btn-primary" href="{{ route('post_detail',['post_id' => $singlePost->post_id]) }}">Read More
        <span class="glyphicon glyphicon-chevron-right"></span></a>

    <hr>

    @endforeach
@else
<h4>NO RECORD FOUND!</H4>
@endif
