@extends('layouts.app')
@section('title', 'Tambah Pasien')
@section('content')
  <div class="container my-4">
    <div class="card shadow-sm border-0 rounded-3">
      <div class="card-header" style="background-color: var(--light-green); color: var(--text-color);">
        <h6 class="mb-0">Tambah Pasien</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('patients.store') }}">
          @csrf

          <div class="mb-3">
            <label class="form-label fw-semibold">Nama</label>
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
              placeholder="Masukkan nama pasien" value="{{ old('nama') }}" style="font-size: 14px;">
            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="row mb-3">
            <div class="col-md-6 mb-3 mb-md-0">
              <label class="form-label fw-semibold" style="font-size: 14px;">Telepon</label>
              <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror"
                placeholder="0812xxxxxxx" value="{{ old('telepon') }}" style="font-size: 14px;">
              @error('telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold" style="font-size: 14px;">Rumah Sakit</label>
              <select name="hospital_id" class="form-select @error('hospital_id') is-invalid @enderror" required
                style="font-size: 14px;">
                <option value="">- Pilih Rumah Sakit -</option>
                @foreach ($hospitals as $rs)
                  <option value="{{ $rs->id }}" {{ old('hospital_id') == $rs->id ? 'selected' : '' }}>{{ $rs->nama }}</option>
                @endforeach
              </select>
              @error('hospital_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold" style="font-size: 14px;">Alamat</label>
            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3"
              placeholder="Masukkan alamat pasien" style="font-size: 14px;">{{ old('alamat') }}</textarea>
            @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('patients.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
            <button type="submit" class="btn btn-custom-primary btn-sm">Simpan</button>
          </div>

        </form>
      </div>
    </div>
  </div>
@endsection