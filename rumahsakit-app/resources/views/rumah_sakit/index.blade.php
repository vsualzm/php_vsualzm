@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Rumah Sakit</h2>
    <a href="{{ route('pasien.index') }}" class="btn btn-primary mb-3">Ke Halaman Pasien</a>
    <a href="{{ route('rumah-sakit.create') }}" class="btn btn-primary mb-3">Tambah Rumah Sakit</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rumahSakits as $rs)
            <tr>
                <td>{{ $rs->id }}</td>
                <td>{{ $rs->nama }}</td>
                <td>{{ $rs->alamat }}</td>
                <td>{{ $rs->email }}</td>
                <td>{{ $rs->telepon }}</td>
                <td>
                    <a href="{{ route('rumah-sakit.edit', $rs->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $rs->id }}">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            let id = this.getAttribute('data-id');
            if (confirm('Yakin ingin menghapus?')) {
                fetch(`/rumah-sakit/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }).then(response => response.json())
                  .then(data => {
                      if (data.success) location.reload();
                  });
            }
        });
    });
</script>
@endsection
