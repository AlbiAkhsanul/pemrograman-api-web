@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-capitalize">{{ $dataPost['title'] }}</h2>
            <div class="d-flex fs-4 mb-2">
                <p class="text-secondary">by: <span class="text-decoration-none text-black">{{ $dataUser['name'] }}</span></p>
            </div>

            <div class="my-2" style="max-width: 1000px; overflow: hidden;">
                    <img src="{{ $imageUrl }}" alt="{{ $imageUrl }}" style="max-height:300px">
            </div>

            <article class="my-3 fs-5">{{ $dataPost['body'] }}</article>
            {{-- {!! $post->body !!} Unprotected echo (html variables can be called) --}}
            <a class="btn btn-secondary" href="javascript:history.back()" role="button">Back</a>
        </div>
    </div>
</div>
@endsection