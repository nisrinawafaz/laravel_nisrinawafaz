@extends('layouts.app')
@section('title', 'Edit Rumah Sakit')
@section('content')
  <div class="container my-4">
    <div class="card shadow-sm border-0 rounded-3">
      <div class="card-header" style="background-color: var(--light-green); color: var(--text-color);">
        <h6 class="mb-0">Edit Rumah Sakit</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('hospitals.update', $hospital) }}">
          @csrf @method('PUT')

          <div class="mb-3">
            <label class="form-label fw-semibold">Nama</label>
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
              placeholder="Masukkan nama rumah sakit" value="{{ old('nama', $hospital->nama) }}" style="font-size: 14px;">
            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="row mb-3">
            <div class="col-md-6 mb-3 mb-md-0">
              <label class="form-label fw-semibold" style="font-size: 14px;">Telepon</label>
              <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror"
                placeholder="0812xxxxxxx" value="{{ old('telepon', $hospital->telepon) }}" style="font-size: 14px;">
              @error('telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 mb-3 mb-md-0">
              <label class="form-label fw-semibold" style="font-size: 14px;">Email</label>
              <input type="email" name="email" style="font-size: 14px;"
                class="form-control  @error('email') is-invalid @enderror" placeholder="Masukkan email rumah sakit"
                value="{{ old('email', $hospital->email) }}">
              @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold" style="font-size: 14px;">Alamat</label>
            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3"
              placeholder="Masukkan alamat rumah sakit"
              style="font-size: 14px;">{{ old('alamat', $hospital->alamat) }}</textarea>
            @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('hospitals.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
            <button class="btn btn-custom-primary btn-sm">Update</button>
          </div>

        </form>
      </div>
    </div>
  </div>
@endsection