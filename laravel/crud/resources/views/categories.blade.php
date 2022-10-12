<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories Crud</title>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</head>

<body>


    <div class="container">
        <h2 class="text-primary">Categories</h2>
        <a class="btn btn-primary" href="{{ route('create_category') }}">Create Category</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
               @if(count($categories))
                @foreach ($categories as $key => $singleCategories)
                    <tr>
                            <td>{{ $singleCategories->cat_id }}</td>
                            <td>{{ $singleCategories->cat_title }}</td>
                            <td><a class="btn btn-warning" href="">Edit</a></td>
                            <td><a class="btn btn-danger" href="" onclick="return confirm('Are You Sure ?')">Delete</a></td>
                        </tr>
                @endforeach

                        @else
                        <h2>nothing found</h2>
                        @endif

            </tbody>
        </table>
    </div>
</body>

</html>
