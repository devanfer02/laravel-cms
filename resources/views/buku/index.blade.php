@extends('templates/layout')

@section('page_title', 'Data Buku')

@section('content')
<section class="container justify-center">
  <div class="row justify-content-center align-items-center my-5">
    <div class="">
      <h2 class="font-weight-semi">Data Buku</h2>
      <h5>List Buku yang tersedia di perpustakaan</h5>
    </div>
    <div>
      <div class="d-flex justify-content-between">
        <div>
          {{  $list_buku->links()  }}
        </div>
        <div class="ml-auto mr-5">
          <a href="{{ route('buku.tambah.page') }}" class="btn btn-success">Tambah Buku</a>
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
            <th scope="col" class="" style="font-size: 18px;">Nama Buku</th>
            <th scope="col" class="" style="font-size: 18px;">Kategori</th>
            <th scope="col" class="" style="font-size: 18px;">Penerbit</th>
            <th scope="col" class="" style="font-size: 18px;">Tahun</th>
            <th scope="col" class="" style="font-size: 18px;">Jumlah Buku</th>
            <th scope="col" class="" style="font-size: 18px;">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($list_buku as $buku)
            <tr>
              <td style="font-size: 18px;">{{ $loop->iteration }}</td>
              <td style="font-size: 18px;">{{ $buku->nama }}</td>
              <td style="font-size: 18px;">{{ $buku->kategori }}</td>
              <td style="font-size: 18px;">{{ $buku->penerbit }}</td>
              <td style="font-size: 18px;">{{ $buku->tahun }}</td>
              <td style="font-size: 18px;">{{ $buku->jumlah_buku }}</td>
              <td>
                <form action="{{ route('buku.hapus', $buku->id) }}" method="POST">
                  <a class="btn btn-primary px-4" href="{{ route('buku.perbarui.page', $buku->id) }}">Edit</a>
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger px-3" type="submit">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" style="font-size: 18px;" class="text-center">Tidak ada data buku</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection
