@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom mb-3 pt-3 pb-2">
    <div>
        <a href="/dashboard" class="btn btn-warning btn-sm"><span data-feather="home"></span> Main Dashboard</a>
        <a href="/dashboard/employees/create" class="btn btn-primary btn-sm">Add new employee</a>
    </div>
    <h6 class="text-muted">Welcome, @Human Resource Dashboard -> Employees Data |
        <div class="btn btn-secondary btn-sm">
          {{ auth()->user()->name }}
        </div>
    </h6>
</div>

@if(session()->has('success'))
  <div class="alert alert-success col-lg-12" role="alert">
    {{ session('success') }}
  </div>  
@endif

<div class="table-responsive col-lg-12">
    <div class="panel panel-heading mb-3">
      <form action="/dashboard/employees" method="GET">
          Keyword: <input type="text" name="keyword" class="" value="{{ $keyword }}">
          <button type="submit" class="btn btn-success btn-sm">Search</button>
      </form>
    </div>

    <table class="table table-striped table-sm">   
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">NIP</th>
          <th scope="col">Branch</th>
          <th scope="col">Departement</th>
          <th scope="col">Position</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      
      <tbody>
        @foreach ($datas as $data)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->nip }}</td>
            <td>{{ $data->branch }}</td>
            <td>{{ $data->departement }}</td>
            <td>{{ $data->position }}</td>
            <td>{{ $data->status }}</td>
            <td>
                <a href="/dashboard/employees/{{ $data->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="/dashboard/employees/{{ $data->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/employees/{{ $data->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Are you sure, want to delete?!')"><span data-feather="x-circle"></span></button>
                </form>
            </td>
          </tr>
        @endforeach
      </tbody>
      
    </table>
    
    {{ $datas->links() }}
  
  </div>

@endsection