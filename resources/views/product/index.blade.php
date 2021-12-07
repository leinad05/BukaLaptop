@extends('layouts.argon')
@section('judul_halaman')
    Products
@endsection
@section('tempat_konten')
{{-- ini popup utk btn show /ajax --}}
<div class="modal fade" id="editModals" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
              <h4 class="modal-title">Edit Product</h4>
          </div>
          
              <div class="modal-body" id = "msgFormEdit">
                  
              </div>
      </div>
      <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
{{-- end ini popup utk btn show /ajax --}}
<div class="row">
    <div class="col">
      @if (session('status'))
        <div class = "alert alert-success">
            {{ session('status') }}
        </div>
      @endif
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
            <div class="row">
                <div class="col-8">
                    <h3 class="mb-0">Master Product</h3>
                </div>
                <div class="col-4 text-right">
                    <a href="{{ route('products.create') }}" class="btn btn-neutral btn-sm"><i class="fa fa-plus"></i>
                      Add Product</a>
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
                              <a class="dropdown-item" data-toggle="modal" href="#editModals"
                              onclick="getDataFirstEdit({{ $p->id }})">Edit Data</a>
                              <a class="dropdown-item" data-toggle="modal" href="#modal_edit_logo_{{ $p->id }}">Edit Image</a>
                              {{-- @can('delete-permission', $p) --}}
                              <form method = "POST" action = "{{ route('products.destroy', $p->id) }}">
                                @method('DELETE')
                                @csrf
                                <button class="dropdown-item" href="#" onclick="if(!confirm('This transaction will be deleted. are you sure?')){return false;}" type = "submit">Delete</button>
                              </form>
                              {{-- @endcan --}}
                            </div>
                          </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="modal_edit_logo_{{ $p->id }}" tabindex="-1" role="basic" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                  <h4 class="modal-title">
                                      Edit Image
                                  </h4>
                              </div>
                              <form enctype="multipart/form-data" action="{{ route('products.changeImage') }}" method="POST">
                              @csrf
                                  <div class="modal-body">
                                      <div class="form-group row">
                                          <label for="nama" class="col-sm-2 col-form-label">Image</label>
                                          <div class="col-sm-10">
                                            <input type="file" class="form-control" name="logo" id="logo" placeholder="logo">
                                          </div>
                                          <input type="hidden" name="id" value="{{ $p->id }}">
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary">Save</button>
                                      <button type="button" class="btn btn-default" onclick="$('.modal').modal('hide');">Cancel</button>
                                  </div>
                              </form>
                          </div>
                          <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                  </div>
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

  function getDataFirstEdit(id)
  {
    $.ajax({
      type:'GET',
      url:'{{ route("products.getEditFormOnly") }}',
      data:'id='+id,
      success:function(data){
        $("#msgFormEdit").html(data.msg);
    }});
  }
</script>
@endsection
