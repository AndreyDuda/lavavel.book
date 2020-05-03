@extends('layouts.app')
@section('content')
    @php /** @var \App\Models\BlogCategory $category */ @endphp
    @if ($post->exists)
        <form method="POST" action="{{ route('blog.admin.categories.update', $category->id) }}">
        @method('PATCH')
    @else
        <form method="POST" action="{{ route('blog.admin.categories.store') }}">
    @endif
        @csrf
        <div class="container">
            @if ($errors->any())
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        @foreach($errors->all() as $message)
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"></span>
                            </button>
                            {!! $message !!}
                        </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if (session('success'))
                    <div class="row justify-content-center">
                        <div class="col-md-11">
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                                {{ session()->get('success') }}
                            </div>
                        </div>
                    </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('blog.admin.categories.includes.item_edit_main_col')
                </div>
                <div class="col-md-3">
                    @include('blog.admin.categories.includes.item_edit_add_col')
                </div>
            </div>
        </div>
    </form>
@endsection
