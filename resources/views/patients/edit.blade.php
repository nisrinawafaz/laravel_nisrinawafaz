@extends('layouts.app')
@section('title', 'Edit Pasien')
@section('content')
  <div class="container my-4">
    <div class="card shadow-sm border-0 rounded-3">
      <div class="card-header" style="background-color: var(--light-green); color: var(--text-color);">
        <h6 class="mb-0">Edit Pasien</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('patients.update', $patient) }}">
          @csrf @method('PUT')
          <div class="mb-3">
            <label class="form-label fw-semibold" style="font-size: 14px;">Nama</label>
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
              placeholder="Masukkan nama pasien" value="{{ old('nama', $patient->nama) }}" style="font-size: 14px;">
            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="row mb-3">
            <div class="col-md-6 mb-3 mb-md-0">
              <label class="form-label fw-semibold" style="font-size: 14px;">Telepon</label>
              <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror"
                placeholder="0812xxxxxxx" value="{{ old('telepon', $patient->telepon) }}" style="font-size: 14px;">
              @error('telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold" style="font-size: 14px;">Rumah Sakit</label>
              <select name="hospital_id" class="form-select" required>
                @foreach ($hospitals as $rs)
                  <option value="{{ $rs->id }}" @selected(old('hospital_id', $patient->hospital_id) == $rs->id)>
                    {{ $rs->nama }}
                  </option>
                @endforeach
              </select>
              @error('hospital_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold" style="font-size: 14px;">Alamat</label>
            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3"
              placeholder="Masukkan alamat pasien"
              style="font-size: 14px;">{{ old('alamat', $patient->alamat) }}</textarea>
            @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('patients.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
            <button class="btn btn-custom-primary btn-sm">Update</button>
          </div>
      </div>
      </form>
    </div>
  </div>
  </div>
@endsection