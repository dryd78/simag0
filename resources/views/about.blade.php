@extends('layouts.main')

@section('container')
    <h3 class="mb-5">SIMAG Founder :</h3>
    <h3>{{ $name }}</h3>
    <p>{{ $email }}</p>
    <img src="img/{{ $image }}" alt="{{ $name }}" width=150 class="img-thumbnail rounded-circle">

@endsection
