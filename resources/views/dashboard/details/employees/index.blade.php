@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom mb-3 pt-3 pb-2">
    <a href="/dashboard" class="btn btn-warning btn-sm"><span data-feather="home"></span> Main Dashboard</a>
    <h6 class="text-muted">Welcome, @Human Resource Dashboard | 
      <div class="btn btn-secondary btn-sm">
        {{ auth()->user()->name }}
      </div>
    </h6>
  </div>

    <div class="row mb-4">
        <div class="col-xl-3 col-lg-6">
          <div class="card bg-primary text-white mb-4">
            <div class="card-body">
                <div><h2>{{ $employee_count }}</h2></div>
                <div class="">Total Employees</div>
            </div>
          </div> 
        </div>
        <div class="col-xl-3 col-lg-6">
          <div class="card bg-primary text-white mb-4">
            <div class="card-body">
                <div><h2>{{ $employee_male_count }}</h2></div>
                <div class="">Total Male Employees</div>
            </div>
          </div> 
        </div>
        <div class="col-xl-3 col-lg-6">
          <div class="card bg-primary text-white mb-4">
            <div class="card-body">
                <div><h2>{{ $employee_female_count }}</h2></div>
                <div class="">Total Female Employees</div>
            </div>
          </div> 
        </div>
    </div>

    <div class="row">
      <div class="col-lg-6 border">
        Graphic View3
      </div>
      
      <div class="col-lg-6 border">
        <div class="row border">
          <table class="table table-striped table-sm">
            <thead>
              <small class="text-muted mb-1">sort by: Education</small>
              <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Education Level</th>
                <th scope="col">SUM</th>
                <th scope="col">%</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                  <td>#</td>
                  <td>Komposisi</td>
                  <td>Jumlah</td>
                  <td>Prosentase</td>
              </tr>
            </tbody>
          </table>

        </div>
        <div class="row border">
          2nd Table

        </div>
        <div class="row border">
          3rd Table
        </div>
      </div>
    </div>

@endsection