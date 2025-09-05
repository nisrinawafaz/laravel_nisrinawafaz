@extends('layouts.app')
@section('title', 'Tambah Rumah Sakit')

@section('content')
  <div class="container my-4">
    <div class="card shadow-sm border-0 rounded-3">
      <div class="card-header" style="background-color: var(--light-green); color: var(--text-color);">
        <h6 class="mb-0">Tambah Rumah Sakit</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('hospitals.store') }}">
          @csrf

          <div class="mb-3">
            <label class="form-label fw-semibold" style="font-size: 14px;">Nama</label>
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
              placeholder="Masukkan nama rumah sakit" value="{{ old('nama') }}" style="font-size: 14px;">
            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="row mb-3">
            <div class="col-md-6 mb-3 mb-md-0">
              <label class="form-label fw-semibold" style="font-size: 14px;">Telepon</label>
              <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror"
                placeholder="0812xxxxxxx" value="{{ old('telepon') }}" style="font-size: 14px;">
              @error('telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 mb-3 mb-md-0">
              <label class="form-label fw-semibold" style="font-size: 14px;">Email</label>
              <input type="email" name="email" style="font-size: 14px;"
                class="form-control  @error('email') is-invalid @enderror" placeholder="Masukkan email rumah sakit"
                value="{{ old('email') }}">
              @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold" style="font-size: 14px;">Alamat</label>
            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3"
              placeholder="Masukkan alamat rumah sakit" style="font-size: 14px;">{{ old('alamat') }}</textarea>
            @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('hospitals.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
            <button type="submit" class="btn btn-custom-primary btn-sm">Simpan</button>
          </div>

        </form>
      </div>
    </div>
  </div>
@endsection