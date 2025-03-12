@extends('dashboard.layouts.main')

@section('container')
<div class="container my-4">
    <div class="row ">
        <div class="col-md-8">
            <h2 class="text-capitalize">{{ $data['title'] }}</h2>
            <div class="d-flex fs-4 mb-2">
                <p class="text-secondary">by: <span class="text-decoration-none text-black">{{ $name }}</span></p>
            </div> 

            <div style="max-height: 400px;max-width: 80%;overflow:hidden;">
                    <img src="{{ $imageUrl }}" alt="{{ $imageUrl }}" class="img-fluid my-2">
            </div>

            <article class="mt-3 mb-4 fs-5">{{ $data['body'] }}</article>
            {{-- {!! $post->body !!} Unprotected echo (html variables can be called) --}}
            <div>
                <a href="/dashboard/posts" class="btn btn-success me-2"><i class="bi bi-arrow-left me-1"></i>Back To My Posts</a>
                <a href="/dashboard/posts/{{ $data['id'] }}/edit" class="btn btn-warning text-white me-2"><i class="bi bi-pencil-square me-1"></i>Edit This Post</a>
                <form action="/dashboard/posts/{{ $data['id'] }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus post ini?')"><i class="bi bi-trash3 me-1"></i>Delete This Post</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection