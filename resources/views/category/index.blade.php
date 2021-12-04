@extends('layouts.argon')
@section('judul_halaman')
    Categories
@endsection
@section('tempat_konten')
    @if (session('sukses'))
        <div class="alert alert-success" role="alert">
            {{ session('sukses') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

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
                            <a href="#modal_add_category" class="btn btn-sm btn-neutral" data-toggle="modal"><i
                                    class="fa fa-plus"></i> Add Category</a>
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
                                    <td class="text-center">{{ $c->id }}</td>
                                    <td class="editable text-center" id="data_name_{{ $c->id }}">
                                        {{ $c->nama_kategori }}</td>
                                    <td class="text-right">
                                        <a href="#modal_edit_category" class="btn btn-sm btn-warning" data-toggle="modal"
                                            onclick="getDataFirst({{ $c->id }})">Edit</a>
                                        {{-- @can('delete-permission', $c) --}}
                                        <button type="button" class="btn btn-sm btn-danger" onclick="delete_data_category_ajax({{ $c->id }})">Delete</button>
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

    {{-- ini popup utk btn tambah /ajax --}}
    <div class="modal fade" id="modal_add_category" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add category</h4>
                </div>
                <form action="{{ route('categories.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="insert category's name">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn  btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- end ini popup utk btn tambah --}}

    {{-- ini popup utk btn edit /ajax --}}
    <div class="modal fade" id="modal_edit_category" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Edit category</h4>
                </div>
                <div class="modal-body" id="isi_modal_edit_category">
                    --form edit--
                </div>
            </div>
        </div>
    </div>
    {{-- end ini popup utk btn edit --}}

@endsection
@section('headerjs')
    <script>
        function getDataFirst(id_category) {
            $('#isi_modal_edit_category').html('loading...');
            $.post('{{ route('categories.getDataFirst') }}', {
                    _token: "<?php echo csrf_token(); ?>",
                    id_category: id_category
                },
                function(data) {
                    if (data.status == 'oke') {
                        $('#isi_modal_edit_category').html(data.msg);
                    } else {
                        $('#isi_modal_edit_category').html('Gagal ambil data');
                    }
                }
            );

        }

        function delete_data_category_ajax(id_category) {
            if (confirm('Are you sure want to delete ?')) {
                $('#isi_modal_edit_category').html('loading...');
                $.post('{{ route('categories.delete_data_category_ajax') }}', {
                        _token: "<?php echo csrf_token(); ?>",
                        id_category: id_category
                    },
                    function(data) {
                        if (data.status == 'oke') {
                            $('#tr_' + id_category).remove();
                        }
                        // alert(data.msg);
                    }
                );
            }
        }
    </script>
@endsection
@section('footerjs')
    <script>
        $(document).ready(function() {
            $('#tabel-kategori').DataTable();
        });
    </script>
@endsection
