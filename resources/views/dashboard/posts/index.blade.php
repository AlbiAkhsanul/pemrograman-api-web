@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">My Posts</h1>
</div>

@if (session()->has('success'))
  <div class="alert alert-success col-lg-10" role="alert">
    {{ session('success') }}
  </div> 
@endif

<div class="table-responsive small col-lg-10 mb-5">
  <a href="/dashboard/posts/create" class="btn btn-primary my-3"><i class="bi bi-pencil me-1"></i>New Post</a>
  <table class="table table-striped table-sm align-middle">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Tttle</th>
        <th scope="col">Category</th>
        <th scope="col" style="text-align: center">Action</th>
      </tr>
    </thead>
  </table>
</div>
@endsection