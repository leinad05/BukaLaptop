@extends('layouts.argon')
@section('judul_halaman')
    Human Resource
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
                            <h3 class="mb-0">Employee List</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="#modal_add_employee" class="btn btn-sm btn-neutral" data-toggle="modal"><i
                                    class="fa fa-plus"></i> Add Employee</a>
                        </div>
                    </div>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table table-striped" id="tabel-brand">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $e)
                                <tr id="tr_{{ $e->id }}">
                                    <td class="text-center">{{ $e->id }}</td>
                                    <td class="editable text-center" id="data_name_{{ $e->id }}">
                                        {{ $e->name }}</td>
                                    <td class="editable text-center" id="data_email_{{ $e->id }}">
                                        {{ $e->email }}</td>
                                    <td class="editable text-center" id="data_status_{{ $e->id }}">
                                        {{ $e->status }}</td>
                                    <td class="text-right">

                                        @if ($e->status != 'active')
                                            <a id="data_button_{{ $e->id }}" href="{{ url('hr/suspend_data_hr_ajax/' . $e->id) }}"
                                                class="btn btn-sm btn-secondary"> &nbsp;Allow &nbsp; </a>
                                        @else
                                            <a id="data_button_{{ $e->id }}" href="{{ url('hr/suspend_data_hr_ajax/' . $e->id) }}"
                                                class="btn btn-sm btn-secondary">Suspend</a>
                                        @endif


                                        <a href="#modal_edit_employee" class="btn btn-sm btn-warning" data-toggle="modal"
                                            onclick="getDataFirst({{ $e->id }})">Edit</a>
                                        
                                        <!--bagian reset pass-->
                                        <a href="#modal_edit_employee" class="btn btn-sm btn-warning" data-toggle="modal"
                                            onclick="resetPassword({{ $e->id }})">Reset Password</a>

                                        
                                        {{-- @can('delete-permission', $e) --}}
                                        <button type="button" class="btn btn-sm btn-danger"
                                            onclick="delete_data_hr_ajax({{ $e->id, $e->status }})">Delete</button>
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
    <div class="modal fade" id="modal_add_employee" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add Employee</h4>
                </div>
                <form action="{{ route('hr.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="insert employee's name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" class="form-control" id="email"
                                    placeholder="insert employee's email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="text" name="password" class="form-control" id="password"
                                    placeholder="insert employee's password">
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
    <div class="modal fade" id="modal_edit_employee" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Edit Employee</h4>
                </div>
                <div class="modal-body" id="isi_modal_edit_employee">
                    --form edit--
                </div>
            </div>
        </div>
    </div>
    {{-- end ini popup utk btn edit --}}

@endsection
@section('headerjs')
    <script>
        function getDataFirst(id_user) {
            $('#isi_modal_edit_employee').html('loading...');
            $.post('{{ route('hr.getDataFirst') }}', {
                    _token: "<?php echo csrf_token(); ?>",
                    id_user: id_user
                },
                function(data) {
                    if (data.status == 'oke') {
                        $('#isi_modal_edit_employee').html(data.msg);
                    } else {
                        $('#isi_modal_edit_employee').html('Failed to load data');
                    }
                }
            );

        }

        function resetPassword(id_user) {
            $('#isi_modal_edit_employee').html('loading...');
            $.post('{{ route('hr.getResetPassword') }}', {
                    _token: "<?php echo csrf_token(); ?>",
                    id_user: id_user
                },
                function(data) {
                    if (data.status == 'oke') {
                        $('#isi_modal_edit_employee').html(data.msg);
                    } else {
                        $('#isi_modal_edit_employee').html('Failed to load data');
                    }
                }
            );

        }

        function delete_data_hr_ajax(id_user) {
            if (confirm('Are you sure want to delete ?')) {
                $('#isi_modal_edit_employee').html('loading...');
                $.post('{{ route('hr.delete_data_hr_ajax') }}', {
                        _token: "<?php echo csrf_token(); ?>",
                        id_user: id_user
                    },
                    function(data) {
                        if (data.status == 'sukses') {
                            $('#tr_' + id_user).remove();
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
            $('#tabel-brand').DataTable();
        });
    </script>
@endsection
