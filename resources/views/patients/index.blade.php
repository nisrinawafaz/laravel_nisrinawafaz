@extends('layouts.app')
@section('title', 'Data Pasien')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3 
                          py-1 px-3 bg-light rounded shadow-sm border ">
    <h6 class="mb-0 text-dark fw-bold">Data Pasien</h4>
      <a href="{{ route('patients.create') }}" class="btn btn-light btn-sm ">
        <i class="fas fa-plus-circle me-1"></i> Tambah Data
      </a>
  </div>

  <div class="mb-3">
    <label for="hospitalFilter" class="form-label" style="font-size:14px">Filter Rumah Sakit</label>
    <select id="hospitalFilter" class="form-select">
      <option value="">-- Semua Rumah Sakit --</option>
      @foreach($hospitals as $hospital)
        <option value="{{ $hospital->id }}">{{ $hospital->nama }}</option>
      @endforeach
    </select>
  </div>

  <div id="patient-list">
    @include('patients.components.list', ['patients' => $patients])
  </div>
  {{ $patients->links('pagination::bootstrap-5') }}

  <script type="module">
    $(document).on('click', '.delete-patient', function (e) {
      e.preventDefault();
      var patientId = $(this).data('id');
      if (confirm('Apakah anda yakin akan menghapus data pasien ini?')) {
        $.ajax({
          url: '/patients/' + patientId,
          type: 'POST',
          data: {
            _method: 'DELETE',
            _token: "{{ csrf_token() }}",
          },
          success: function (response) {
            if (response.status === 'ok') {
              alert('Data Pasien berhasil dihapus!');
              location.reload();
            }
          },
          error: function (xhr) {
            alert('Data Pasien gagal dihapus!');
          }
        });
      }
    });

    $(document).ready(function () {
      $('#hospitalFilter').on('change', function () {
        let hospitalId = $(this).val();

        $.ajax({
          url: "{{ route('patients.index') }}",
          type: 'GET',
          data: { hospital_id: hospitalId },
          success: function (response) {
            $('#patient-list').html(response);
          },
          error: function () {
            alert('Gagal memuat data pasien.');
          }
        });
      });
    });
  </script>
@endsection