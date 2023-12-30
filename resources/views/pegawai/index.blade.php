@extends('templates/layout')

@section('page_title', 'Data Pegawai')

@section('content')
<section class="container justify-center mb-5">
  <div class="row justify-content-center align-items-center my-5">
    <div class="">
      <h2 class="font-weight-semi">Data Pegawai</h2>
      <h5>List Pegawai yang bekerja di perpustakaan</h5>
    </div>
    <div>
      <div class="d-flex justify-content-between">
        <div>
          {{  $list_pegawai->links()  }}
        </div>
        <div class="ml-auto mr-5">
          <a href="{{ route('pegawai.tambah.page') }}" class="btn btn-success">Tambah Pegawai</a>
        </div>
      </div>
      @if (session('success'))
      <div class="alert alert-success d-flex justify-content-between align-items-center mt-2" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <table class="table border b">
        <thead>
          <tr>
            <th scope="col" class="" style="font-size: 18px;">No</th>
            <th scope="col" class="" style="font-size: 18px;">Nama Pegawai</th>
            <th scope="col" class="" style="font-size: 18px;">No Telfon</th>
            <th scope="col" class="" style="font-size: 18px;">Alamat</th>
            <th scope="col" class="" style="font-size: 18px;">Posisi</th>
            <th scope="col" class="" style="font-size: 18px;">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($list_pegawai as $pegawai)
            <tr>
              <td style="font-size: 18px;">{{ $loop->iteration }}</td>
              <td style="font-size: 18px;">{{ $pegawai->nama }}</td>
              <td style="font-size: 18px;">{{ $pegawai->nomor_telfon }}</td>
              <td style="font-size: 18px;">{{ $pegawai->alamat }}</td>
              <td style="font-size: 18px;">{{ $pegawai->posisi }}</td>
              <td>
                <form action="{{ route('pegawai.hapus', $pegawai->id) }}" method="POST">
                  <a class="btn btn-primary px-4" href="{{ route('pegawai.perbarui.page', $pegawai->id) }}">Edit</a>
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger px-3" type="submit">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" style="font-size:20px;" class="text-center">Tidak ada data pegawai</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection
