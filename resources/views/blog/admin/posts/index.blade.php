@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{ route('blog.admin.posts.create') }}">Написать </a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Автор</th>
                                    <th>Категория</th>
                                    <th>Заголовок</th>
                                    <th>Дата публикация</th>
                                </tr>
                            </thead>
                            <tbody>
                        @php /** @var \App\Models\BlogPost $post */ @endphp
                        @foreach($posts as $post)
                            <tr @if (!$post->is_published) style="background-color: #ccc;" @endif>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->category->title }}</td>
                                <td>
                                    <a href="{{ route('blog.admin.posts.edit', $post->id) }}">
                                        {{ $post->title }}
                                    </a>
                                </td>
                                <td>{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d.M H:i') : '' }}</td>
                            </tr>
                        @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($posts->total() > $posts->count())
        <br />
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                     {{ $posts->links() }}
                </div>
            </div>

        </div>
    @endif
@endsection
