@extends('templates/layout')

@section('page_title', 'Tambah Pegawai')

@section('content')
  <section class="container my-5">
    <div class="">
      <h2>Tambah Data Pegawai</h2>
    </div>
    <form class="" action="{{ route('pegawai.tambah') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pegawai">
        @error('nama')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="nomor_telfon" class="form-label">Nomor Telfon</label>
        <input type="text" class="form-control" id="nomor_telfon" name="nomor_telfon" placeholder="Nomor Telfon">
        @error('nomor_telfon')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
        @error('alamat')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="posisi" class="form-label">Posisi</label>
        <input type="text" class="form-control" id="posisi" name="posisi" placeholder="Posisi">
        @error('posisi')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
      </div>
      <div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/pegawai" class="btn btn-dark">Kembali</a>
      </div>
    </form>
  </section>
@endsection
