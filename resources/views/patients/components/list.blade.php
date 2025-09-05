<div class="table-responsive rounded-1 overflow-hidden">
    <table class="table table-custom table-striped align-middle text-center">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Rumah Sakit</th>
                <th style="width:140px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($patients as $patient)
                <tr id="pt-row-{{ $patient->id }}">
                    <td>{{ $patient->nama }}</td>
                    <td>{{ $patient->alamat }}</td>
                    <td>{{ $patient->telepon }}</td>
                    <td>{{ $patient->hospital->nama ?? '-' }}</td>
                    <td class="text-center">
                        <a href="{{ route('patients.edit', $patient) }}" class="btn btn-outline-primary btn-sm me-2"
                            title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-sm delete-patient" data-id="{{ $patient->id }}"
                            title="Hapus">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-4">
                        <i class="fas fa-exclamation-circle text-muted mb-2" style="font-size: 2rem;"></i>
                        <p class="text-muted">Belum ada data pasien.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>