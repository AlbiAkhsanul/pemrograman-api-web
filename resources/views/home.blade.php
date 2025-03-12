@extends('layouts.main')

@section('container')
<div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="img/dogg.jpg" alt="" width="120" height="120">
    <h1 class="display-5 fw-bold text-body-emphasis">Welcome</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Halo, selamat datang di website blogger anjing saya! Dibangun menggunakan Laravel sebagai kerangka kerja back-end dan Bootstrap untuk front-end. Ini adalah proyek solo sekaligus perjalanan pribadi saya untuk meningkatkan keterampilan dalam pengembangan web dan penggunaan API.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a href="/blogs" class="btn btn-outline-danger btn-lg px-4 gap-3">Lets Get Started</a>
      </div>
    </div>
</div>
@endsection