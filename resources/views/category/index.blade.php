@extends('layouts.argon')
@section('judul_halaman')
    Categories
@endsection
@section('tempat_konten')
<div class="row">
    <div class="col">

      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
            <div class="row">
                <div class="col-8">
                    <h3 class="mb-0">Master Category</h3>
                </div>
                <div class="col-4 text-right">
                    <a href="#" class="btn btn-sm btn-neutral">New</a>
                    <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                </div>
            </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
            <table class="table table-striped" id="tabel-kategori">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Name</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $c)
                        <tr id="tr_{{ $c->id }}">
                            <td  class="text-center">{{ $c->id }}</td>
                            <td class="editable text-center" id="data_name_{{ $c->id }}">{{ $c->nama_kategori }}</td>
                            <td  class="text-right">
                                <a href="#modal_edit_supplier" class="btn btn-sm btn-warning" data-toggle="modal" onclick="">Ubah w/Modal-Ajax</a>
                                {{-- @can('delete-permission', $c) --}}
                                    <button type="button" class="btn btn-sm btn-danger"
                                        onclick="">Delete w/Modal-Ajax</button>
                                {{-- @endcan --}}
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
      $('#tabel-kategori').DataTable();
  });
</script>
@endsection
