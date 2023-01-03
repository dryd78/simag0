@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom mb-3 pt-3 pb-2">
  <div>
    <a href="/dashboard/employees" class="btn btn-warning btn-sm">Cancel</a>
  </div>
  <h6 class="text-muted">Welcome, @Human Resource Dashboard -> Employees Data |
    <div class="btn btn-secondary btn-sm">
      {{ auth()->user()->name }}
    </div>
  </h6>
</div>

    <div class="col-lg-8">
        <form method="post" class="row g-3" action="/dashboard/employees" enctype="multipart/form-data">
          @csrf
            <div class="col-md-3">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
              @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            
            <div class="col-md-2">
              <label for="gender" class="form-label">Gender</label>
              <input type="text" list="genderListOptions" class="form-control  @error('gender') is-invalid @enderror" id="gender" name="gender" required autofocus value="{{ old('gender') }}">
                <datalist id="genderListOptions">
                  <option value="Male">
                  <option value="Female">
                </datalist>
                @error('gender')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            
            <div class="col-md-3">
              <label for="birthday" class="form-label">Birthday</label>
              <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday" name="birthday" required value="{{ old('birthday') }}">
                @error('birthday')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            
            <div class="col-md-4">
              <label for="nik" class="form-label">N I K</label>
              <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" required value="{{ old('nik') }}">
                @error('nik')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            
            <div class="col-md-2">
              <label for="nip" class="form-label">N I P</label>
              <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" required value="{{ old('nip') }}">
                @error('nip')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            
            <div class="col-md-3">
              <label for="sign_day" class="form-label">Sign day</label>
              <input type="date" class="form-control @error('sign_day') is-invalid @enderror" id="sign_day" name="sign_day" required value="{{ old('sign_day') }}">
                @error('sign_day')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            
            <div class="mb-2">
              <label for="image" class="form-label">Profil Image</label>
                <img class="img-preview img-fluid mb-2 col-sm-1">
              <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            
            <div class="col-md-2">
              <label for="status" class="form-label">Status</label>
              <input type="text" list="statusListOptions" class="form-control @error('status') is-invalid @enderror" id="status" name="status" required value="{{ old('status') }}">
                <datalist id="statusListOptions">
                  <option value="Permanent">
                  <option value="Contract">
                </datalist>
                @error('status')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            
            <div class="col-3">
              <label for="branch" class="form-label">Branch</label>
              <input type="text" class="form-control @error('branch') is-invalid @enderror" id="branch" name="branch" required value="{{ old('branch') }}">
                @error('branch')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            
            <div class="col-3">
              <label for="departement" class="form-label">Departement</label>
              <input type="text" class="form-control @error('departement') is-invalid @enderror" id="departement" name="departement" required value="{{ old('departement') }}">
                @error('departement')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            
            <div class="col-3">
              <label for="position" class="form-label">Position</label>
              <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" required value="{{ old('position') }}">
                @error('position')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            
            <div class="col-1">
              <label for="grade" class="form-label">Grade</label>
              <input type="text" class="form-control @error('grade') is-invalid @enderror" id="grade" name="grade" required value="{{ old('grade') }}">
                @error('grade')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            
            <div class="col-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email') }}">
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            
            <div class="col-3">
              <label for="phone" class="form-label">Phone</label>
              <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required value="{{ old('phone') }}">
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            
            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" required value="{{ old('address') }}">
                @error('address')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>

            <div>
              <button type="submit" class="btn btn-primary btn-sm my-3">Save</button>
            </div>
            

        </form>
    </div>

    <script>
      function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onLoad = function(oFREvent){
          imgPreview.src = oFREvent.target.result;
        }
      }
    </script>
@endsection

