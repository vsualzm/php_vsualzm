@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Pasien</h2>
    <a href="{{ route('pasien.create') }}" class="btn btn-primary mb-3">Tambah Pasien</a>

    <div class="mb-3">
        <label for="filterRumahSakit" class="form-label">Filter Berdasarkan Rumah Sakit</label>
        <select id="filterRumahSakit" class="form-control">
            <option value="">-- Semua Rumah Sakit --</option>
            @foreach($rumahSakits as $rs)
            <option value="{{ $rs->id }}">{{ $rs->nama }}</option>
            @endforeach
        </select>
    </div>

    <table class="table table-bordered" id="pasiensTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Rumah Sakit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pasiens as $pasien)
            <tr>
                <td>{{ $pasien->id }}</td>
                <td>{{ $pasien->nama }}</td>
                <td>{{ $pasien->alamat }}</td>
                <td>{{ $pasien->telepon }}</td>
                <td>{{ $pasien->rumahSakit->nama }}</td>
                <td>
                    <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $pasien->id }}">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function () {
        $('#filterRumahSakit').change(function () {
            let rumahSakitId = $(this).val();

            $.ajax({
                url: '/pasien/filter/' + rumahSakitId,
                method: 'GET',
                success: function (response) {
                    let tableBody = $('#pasiensTable tbody');
                    tableBody.empty();

                    response.forEach(function (pasien) {
                        tableBody.append(`
                            <tr>
                                <td>${pasien.id}</td>
                                <td>${pasien.nama}</td>
                                <td>${pasien.alamat}</td>
                                <td>${pasien.telepon}</td>
                                <td>${pasien.rumah_sakit_id}</td>
                                <td>
                                    <button class="btn btn-danger btn-sm delete-btn" data-id="${pasien.id}">Delete</button>
                                </td>
                            </tr>
                        `);
                    });
                }
            });
        });

        $(document).on('click', '.delete-btn', function () {
            let id = $(this).data('id');

            if (confirm('Yakin ingin menghapus?')) {
                $.ajax({
                    url: '/pasien/' + id,
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function () {
                        location.reload();
                    }
                });
            }
        });
    });
</script>
@endsection
