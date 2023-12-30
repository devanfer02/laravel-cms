@extends('templates/layout')

@section('page_title', 'Tambah Buku')

@section('content')
  <section class="container my-5">
    <div class="">
      <h2>Tambah Data Buku</h2>
    </div>
    <form class="" action="{{ route('buku.tambah') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Buku">
        @error('nama')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Kategori Buku">
        @error('kategori')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="penerbit" class="form-label">Penerbit</label>
        <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit">
        @error('penerbit')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="tahun" class="form-label">Tahun</label>
        <input type="number" class="form-control" id="tahun" name="tahun" placeholder="Tahun">
        @error('tahun')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="jumlah_buku" class="form-label">Jumlah Buku</label>
        <input type="number" class="form-control" id="jumlah_buku" name="jumlah_buku" placeholder="Jumlah Buku">
        @error('jumlah_buku')
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
