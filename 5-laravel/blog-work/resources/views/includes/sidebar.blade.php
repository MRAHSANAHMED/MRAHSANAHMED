<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form method="POST" action="{{ route('search_post') }}">
            @csrf
            <div class="input-group">
                <input type="text" class="form-control" name="custom_search_value">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    {{-- @if (count($categories) > 0)
                    @foreach ($categories as $key => $singleCategory)
                        <li>
                            <a
                                href="{{ route('category_detail', ['category_id' => $singleCategory->cat_id]) }}">{{ $singleCategory->cat_title }}</a>
                        </li>
                    @endforeach
                @endif --}}

                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

</div>
