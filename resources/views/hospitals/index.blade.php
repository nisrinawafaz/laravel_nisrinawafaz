@extends('layouts.app')
@section('title', 'Data Rumah Sakit')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3 
                        py-1 px-3 bg-light rounded shadow-sm border ">
    <h6 class="mb-0 text-dark fw-bold">Data Rumah Sakit</h4>
      <a href="{{ route('hospitals.create') }}" class="btn btn-light btn-sm ">
        <i class="fas fa-plus-circle me-1"></i> Tambah Data
      </a>
  </div>

  <div id="hospital-list" class="">
    @include('hospitals.components.list', ['hospitals' => $hospitals])
  </div>

  {{ $hospitals->links('pagination::bootstrap-5') }}

  <script type="module">
    $(document).on('click', '.delete-hospital', function (e) {
      e.preventDefault();
      var hospitalId = $(this).data('id');
      if (confirm('Apakah anda yakin akan menghapus data rumah sakit ini?')) {
        $.ajax({
          url: '/hospitals/' + hospitalId,
          type: 'POST',
          data: {
            _method: 'DELETE',
            _token: "{{ csrf_token() }}",
          },
          success: function (response) {
            if (response.status === 'ok') {
              alert('Data Rumah Sakit berhasil dihapus!');
              location.reload();
            }
          },
          error: function (xhr) {
            alert('Data Rumah Sakit gagal dihapus!');
          }
        });
      }
    });
  </script>
@endsection