<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index page</title>
    {{-- Bootstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    {{-- Fontawesome Css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <section class="container">
        <div class="row mt-5">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h5 class="mb-4">Post List
                    <a href="{{ route('posts.create') }}">
                        {{-- {{ url("posts/create") }} --}}
                        <button class="btn btn-primary btn-sm float-end">
                            <i class="fa-regular fa-square-plus pe-1"></i>Add New
                        </button>
                    </a>
                </h5>

                @if (session('successAlert'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><i class="fa-regular fa-thumbs-up me-1"></i>{{ session('successAlert') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->content }}</td>
                                <td>
                                    <form action="{{ route("posts.destroy", $post->id) }}" method="POST">
                                        {{-- {{ url("posts/{$post->id}") }} --}}

                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route("posts.edit", $post->id) }}">
                                            {{-- {{ url("posts/{$post->id}/edit") }} --}}
                                            <button type="button" class="btn btn-success btn-sm">
                                                <i class="fa-solid fa-pen-to-square"></i>Edit
                                            </button>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">
                                            <i class="fa-solid fa-trash-can"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- PAGINATION --}}
                {{ $posts->links() }}
            </div>
            <div class="col-md-2"></div>
        </div>
    </section>
</body>
{{-- Bootstrap js --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
{{-- Fontawesome js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</html>
