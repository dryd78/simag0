@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom mb-3 pt-3 pb-2">
  <div>
    <a href="/dashboard" class="btn btn-warning btn-sm"><span data-feather="home"></span> Main Dashboard</a>
    <a href="/dashboard/finance/create" class="btn btn-primary btn-sm">Update Balance</a>
  </div>
  <h6 class="text-muted">Welcome, @Finance Dashboard |
    <div class="btn btn-secondary btn-sm">
      {{ auth()->user()->name }}
    </div>
  </h6>
</div>

@endsection