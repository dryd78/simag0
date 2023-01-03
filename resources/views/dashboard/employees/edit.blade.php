@extends('dashboard.layouts.main')

@section('container')
    <div class="col-lg-8 border-bottom mb-3">
        <h2 class="my-3">Edit Data</h2>
    </div>

    <div class="col-lg-8">
        <form method="post" class="row g-3" action="/dashboard/employees/{{ $employee->id }}" enctype="multipart/form-data">
          @method('put')
          @csrf
            <div class="col-md-3">
              <label for="name" class="form-label text-muted">Full Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $employee->name) }}">
              @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col-md-2">
              <label for="name" class="form-label text-muted">Gender</label>
              <input type="text" list="genderListOption" class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" required autofocus value="{{ old('gender', $employee->gender) }}">
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
              <label for="birthday" class="form-label text-muted">Birthday</label>
              <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday" name="birthday" required value="{{ old('birthday', $employee->birthday) }}">
              @error('birthday')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col-md-4">
              <label for="nik" class="form-label text-muted">N I K</label>
              <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" required value="{{ old('nik', $employee->nik) }}">
              @error('nik')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col-md-3">
              <label for="nip" class="form-label text-muted">N I P</label>
              <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" required value="{{ old('nip', $employee->nip) }}">
              @error('nip')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col-md-3">
              <label for="sign_day" class="form-label text-muted">Sign Day</label>
              <input type="date" class="form-control @error('sign_day') is-invalid @enderror" id="sign_day" name="sign_day" required value="{{ old('sign_day', $employee->sign_day) }}">
              @error('sign_day')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-2">
              <label for="image" class="form-label text-muted">Existing Image</label>
              <input type="hidden" name="oldImage" value="{{ $employee->image }}">
                @if($employee->image)
                  <img src="{{ asset('storage/' . $employee->image) }}" class="img-preview img-fluid mb-2 col-sm-1 d-block">               
                @else
                  <img class="img-preview img-fluid mb-2 col-sm-5"> 
                @endif
              <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            <div class="col-md-2">
              <label for="status" class="form-label text-muted">Status</label>
              <input type="text" list="statusListOption" class="form-control @error('status') is-invalid @enderror" id="status" name="status" required value="{{ old('status', $employee->status) }}">
                <datalist id="gstatusListOptions">
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
              <label for="branch" class="form-label text-muted">Branch</label>
              <input type="text" class="form-control @error('branch') is-invalid @enderror" id="branch" name="branch" required value="{{ old('branch', $employee->branch) }}">
              @error('branch')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col-3">
              <label for="departement" class="form-label text-muted">Departement</label>
              <input type="text" class="form-control @error('departement') is-invalid @enderror" id="departement" name="departement" required value="{{ old('departement', $employee->departement) }}">
              @error('departement')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col-3">
              <label for="position" class="form-label text-muted">Position</label>
              <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" required value="{{ old('position', $employee->position) }}">
              @error('position')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col-1">
              <label for="grade" class="form-label text-muted">Grade</label>
              <input type="text" class="form-control @error('grade') is-invalid @enderror" id="grade" name="grade" required value="{{ old('grade', $employee->grade) }}">
              @error('grade')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col-3">
              <label for="email" class="form-label text-muted">Email Address</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email', $employee->email) }}">
              @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col-3">
              <label for="phone" class="form-label text-muted">Phone</label>
              <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required value="{{ old('phone', $employee->phone) }}">
              @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col-12">
              <label for="address" class="form-label text-muted">Address</label>
              <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" required value="{{ old('address', $employee->address) }}">
              @error('address')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary my-3">Save</button>
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

