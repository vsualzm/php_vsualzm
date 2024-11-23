@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Rumah Sakit</h2>
    <form action="{{ route('rumah-sakit.update', $rumahSakit->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $rumahSakit->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $rumahSakit->alamat }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $rumahSakit->email }}" required>
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $rumahSakit->telepon }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
