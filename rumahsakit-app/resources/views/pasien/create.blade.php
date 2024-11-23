@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Pasien</h2>
    <form action="{{ route('pasien.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required>
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" class="form-control" id="telepon" name="telepon" required>
        </div>
        <div class="mb-3">
            <label for="rumah_sakit_id" class="form-label">Rumah Sakit</label>
            <select name="rumah_sakit_id" id="rumah_sakit_id" class="form-control" required>
                @foreach($rumahSakits as $rs)
                <option value="{{ $rs->id }}">{{ $rs->nama }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
