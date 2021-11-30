@extends('layouts.argon')
@section('judul_halaman')
    Products
@endsection
@section('tempat_konten')
<div class="row">
    <div class="col">

      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
            <div class="row">
                <div class="col-8">
                    <h3 class="mb-0">Master Product</h3>
                </div>
                <div class="col-4 text-right">
                    <a href="#" class="btn btn-sm btn-neutral">New</a>
                    <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                </div>
            </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table table-striped" id="tabel-produk">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Release Year</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $p)
                    <tr id="tr_{{ $p->id }}">
                        <td>{{ $p->id }}</td>
                        <td id="data_nama_{{ $p->id }}">{{ $p->nama }}</td>
                        <td id="data_deskripsi_{{ $p->id }}">{{ $p->deskripsi }}</td>
                        <td id="data_stok_{{ $p->id }}">{{ $p->stok }}</td>
                        <td id="data_harga_{{ $p->id }}">{{ $p->harga }}</td>
                        <td id="data_rilis_{{ $p->id }}">{{ $p->tahun_rilis }}</td>
                        <td id="data_foto_{{ $p->id }}">{{ $p->foto }}</td>

                        <td class="text-right">
                          <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                              <a class="dropdown-item" href="{{ url('products/' . $p->id) }}">Detail</a>
                              <a class="dropdown-item" href="#modal_edit_produk" data-toggle="modal"
                              onclick="">Ubah w/Modal-Ajax</a>
                              {{-- @can('delete-permission', $p) --}}
                              <a class="dropdown-item" href="#" onclick="">Delete w/Modal-Ajax</a>
                              {{-- @endcan --}}
                            </div>
                          </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        <!-- Card footer -->
        <div class="card-footer py-4">
        </div>
    </div>
      
    </div>
  </div>
@endsection
@section('headerjs')
   
@endsection
@section('footerjs')
<script>
  $(document).ready(function() {
      $('#tabel-produk').DataTable();
  });
</script>
@endsection
