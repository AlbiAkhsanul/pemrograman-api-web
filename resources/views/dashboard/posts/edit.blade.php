@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/posts/{{ $data['id'] }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title',$data['title']) }}" required autofocus>
          @error('title')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
            <p>Post Image</p>
            <img src="{{ $imageUrl }}"  alt="img" style="height:250px">
        </div>
        <div class="mb-3">
          <label for="body" class="form-label">Body</label>
          <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="5" required autofocus>
            {{ old('body') ?? $data['body'] }}
          </textarea>        
          @error('body')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
          @enderror
          {{-- <input id="body" type="hidden" name="body" value="{{ old('body',$post->body) }}" required>
          <trix-editor input="body"></trix-editor>
          @error('body')
            <p class="text-danger">{{ $message }}</p>
          @enderror --}}
        </div>
        <button type="submit" class="btn btn-primary mt-3 mb-5">Update Post</button>
    </form>
</div>
@endsection