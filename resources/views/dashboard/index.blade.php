@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h6>Welcome, @Main Dashboard Sistem Informasi Manajemen PT Agronesia | {{ auth()->user()->name }}</h6>
  </div>

  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mb-3">
    <div class="col">
      <a href="/dashboard/details/employees" class="text-decoration-none">
      <div class="card shadow-sm">
        <svg class="bd-placeholder-img card-img" width="100%" height="150"><rect width="100%" height="100%" fill="#5F9EA0"/><text x="50%" y="50%" fill="#eceeef">
          Human Resources</text></svg>
      </div>
      </a>
    </div>
    <div class="col">
      <a href="/dashboard/details/finance" class="text-decoration-none">
      <div class="card shadow-sm">
        <svg class="bd-placeholder-img card-img" width="100%" height="150"><rect width="100%" height="100%" fill="#5F9EA0"/><text x="50%" y="50%" fill="#eceeef">
          Finance</text></svg>
      </div>
      </a>
    </div>
    <div class="col">
      <a href="/dashboard/details/it" class="text-decoration-none">
      <div class="card shadow-sm">
        <svg class="bd-placeholder-img card-img" width="100%" height="150"><rect width="100%" height="100%" fill="#5F9EA0"/><text x="50%" y="50%" fill="#eceeef">
          Information Technology</text></svg>
      </div>
      </a>
    </div>
  </div>

  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <div class="col">
      <a href="/dashboard/details/inkaba" class="text-decoration-none">
      <div class="card shadow-sm">
        <svg class="bd-placeholder-img card-img" width="100%" height="150"><rect width="100%" height="100%" fill="#5F9EA0"/><text x="50%" y="50%" fill="#eceeef">
          Inkaba</text></svg>
      </div>
      </a>
    </div>
    <div class="col">
      <a href="/dashboard/details/SpBdg" class="text-decoration-none">
      <div class="card shadow-sm">
        <svg class="bd-placeholder-img card-img" width="100%" height="150"><rect width="100%" height="100%" fill="#5F9EA0"/><text x="50%" y="50%" fill="#eceeef">
          Saripetojo Bandung</text></svg>
      </div>
      </a>
    </div>
    <div class="col">
      <a href="/dashboard/details/SpCrb" class="text-decoration-none">
      <div class="card shadow-sm">
        <svg class="bd-placeholder-img card-img" width="100%" height="150"><rect width="100%" height="100%" fill="#5F9EA0"/><text x="50%" y="50%" fill="#eceeef">
          Saripetojo Cirebon</text></svg>
      </div>
      </a>
    </div>
  </div>

@endsection
