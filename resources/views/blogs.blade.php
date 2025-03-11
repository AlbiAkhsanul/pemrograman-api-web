{{-- @dd($posts) --}}

@extends('layouts.main')

@section('container')

{{-- @if ($data->count() > 0) --}}  
 
 <main class="container">  
  <div class="py-4 py-md-5 px-0 mb-4 rounded text-body-emphasis bg-body-secondary" style="background-image: url('{{ $imageUrls[0] }}'); overflow:hidden;">
    <div class="py-2 px-4" style="width: 100%; background-color: rgba(0,0,0,0.7)">
      <div class="col-lg-8 px-0 text-white">
        <h1 class="display-4 fst-italic">{{ $data[0]['title'] }}</h1>
        <p class="lead my-3">{{ $data[0]['body'] }}</p>
        <a href="/blogs/{{ $data[0]['id'] }}" class="btn btn-danger fs-5 mt-2">Read More</a>
      </div>
    </div>
  </div> 
  <div class="row mb-2">
   <?php $count = 1; ?>
   @foreach ($data as $post)
   <?php if($count > 6) break; ?>
   <div class="col-md-6">
     <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative" id="secondaryPost">
       <div class="col p-4 d-flex flex-column position-static">
         <h3 class="mb-0">{{ $post['title'] }}</h3>
         <p class="card-text mb-auto">{{ $post['body'] }}</p>
         <a href="/blogs/{{ $post['id'] }}" class="text-danger text-decoration-none fs-5 mt-2">
           Read More
         </a>
       </div>
       <div class="col-auto d-none d-lg-block">
        <div style="max-width:300px; overflow:hidden;">
            <img src="{{ $imageUrls[$count] }}"  alt="img" style="height:400px">    
        </div>
       </div>
     </div>
   </div>
   <?php $count++; ?>
   @endforeach
 </div>
{{-- @else
<h2 class="text-center text-body-secondary">No Posts Found</h2>
@endif --}}
@endsection