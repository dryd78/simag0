@extends('dashboard.layouts.main')

@section('container')

  <div class="col-lg-8 border-bottom mb-3">
    <h2 class="my-3">Employee Data</h2>
  </div>

  <img src="{{ asset('storage/' . $employee->image) }}" alt="{{ $employee->name }}" class="img-fluid mb-2 col-sm-1">

<div class="col-lg-8">
  <form class="row g-3">
    @csrf
      <div class="col-md-3">
        <label for="name" class="form-label text-muted">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}">
      </div>
      <div class="col-md-2">
        <label for="gender" class="form-label text-muted">Gender</label>
        <input type="text" class="form-control" id="gender" name="gender" value="{{ $employee->gender }}">
      </div>
      <div class="col-md-4">
        <label for="nik" class="form-label text-muted">N I K</label>
        <input type="text" class="form-control" id="nik" name="nik" value="{{ $employee->nik }}">
      </div>
      <div class="col-md-2">
        <label for="birthday" class="form-label text-muted">Birthday</label>
        <input type="text" class="form-control" id="birthday" name="birthday" value="{{ $employee->birthday }}">
      </div>
      <div class="col-md-2">
        <label for="nip" class="form-label text-muted">N I P</label>
        <input type="text" class="form-control" id="nip" name="nip" value="{{ $employee->nip }}">
      </div>   
      <div class="col-md-2">
        <label for="sign_day" class="form-label text-muted">Sign Day</label>
        <input type="text" class="form-control" id="sign_day" name="sign_day" value="{{ $employee->sign_day }}">
      </div>     
      <div class="col-md-2">
        <label for="status" class="form-label text-muted">Status</label>
        <input type="text" class="form-control" id="status" name="status" value="{{ $employee->status }}">
      </div>  
      <div class="col-md-3">
        <label for="branch" class="form-label text-muted">Branch</label>
        <input type="text" class="form-control" id="branch" name="branch" value="{{ $employee->branch }}">
      </div>
      <div class="col-md-3">
        <label for="departement" class="form-label text-muted">Departement</label>
        <input type="text" class="form-control" id="departement" name="departement" value="{{ $employee->departement }}">
      </div>
      <div class="col-md-3">
        <label for="position" class="form-label text-muted">Position</label>
        <input type="text" class="form-control" id="position" name="position" value="{{ $employee->position }}">
      </div>
      <div class="col-md-1">
        <label for="grade" class="form-label text-muted">Grade</label>
        <input type="text" class="form-control" id="grade" name="grade" value="{{ $employee->grade }}">
      </div>
      <div class="col-md-3">
        <label for="email" class="form-label text-muted">Email Address</label>
        <input type="text" class="form-control" id="email" name="email" value="{{ $employee->email }}">
      </div>   
      <div class="col-md-3">
        <label for="phone" class="form-label text-muted">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ $employee->phone }}">
      </div>
      <div class="col-md-12">
        <label for="address" class="form-label text-muted">Address</label>
        <input type="text" class="form-control" id="address" name="address" value="{{ $employee->address }}">
      </div>
  </form>
</div>

<div class="col-lg-8 mt-3">
    <form class="row g-3">
    @csrf
        <div class="col-lg-8 my-3">
            <a href="/dashboard/employees" class="btn btn-success"><span data-feather="arrow-left"></span> Back to employees data</a>
            <a href="/dashboard/employees/{{ $employee->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
          <form action="/dashboard/employees/{{ $employee->id }}" method="post" class="d-inline">
            @method('delete')
              @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure, want to delete?!')"><span data-feather="x-circle"></span> Delete</button>
          </form>
        </div>
    </form>
</div>


@endsection

