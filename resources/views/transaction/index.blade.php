@extends('layouts.argon')
@section('judul_halaman')
    Transactions
@endsection
@section('tempat_konten')

    {{-- ini popup utk btn show /ajax --}}
    <div class="modal fade" id="editModals" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Edit Transaction</h4>
                </div>
                <form role="form" method = "POST" action = "">
                    <div class="modal-body" >
                            @csrf
                            <label>Transaction: </label>
                            <input type="text" class="form-control" name = "nmSupplier">
                            <small class = "form-text text-muted">Isikan nama supplier anda</small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type = "submit" class = "btn btn-primary" value = "x">Submit</button>
                    </div>     
                </form> 
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- end ini popup utk btn show /ajax --}}

    <div class="row">
        <div class="col">

            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="mb-0">Master Transaction</h3>
                        </div>
                    </div>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table table-striped" id="tabel-transaksi">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Customer</th>
                                <th class="text-center">Transaction Date</th>
                                <th class="text-center">Total</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $t)
                                <tr id="tr_{{ $t->id }}">
                                    <td class="text-center">{{ $t->id }}</td>
                                    <td class="editable text-center" id="data_customer_{{ $t->id }}">
                                        {{ $t->user->name }}</td>
                                    <td class="editable text-center" id="data_date_{{ $t->id }}">
                                        {{ $t->tanggal_transaksi }}</td>
                                    <td class="editable text-center" id="data_total_{{ $t->id }}">
                                        {{ $t->total }}</td>
                                    <td class="text-right">
                                        <a class = "btn btn-sm btn-warning" onclick="getDataFirst({{ $t->id }})" data-toggle="modal" href="#editModals">Ubah</a>
                                        {{-- @can('delete-permission', $t) --}}
                                        <form method = "POST" action = "{{ route('transactions.destroy', $t->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="if(!confirm('This transaction will be deleted. are you sure?')){return false;}">Delete</button>
                                        </form>
                                        {{-- @endcan --}}
                                        <a href="#" data-target="#basic" class="btn btn-sm btn-primary" data-toggle="modal"
                                            onclick="getDetailData({{ $t->id }})">Show Detail</a>
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

    {{-- ini popup utk btn show /ajax --}}
    <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Transaction Detail</h4>
                </div>
                <div class="modal-body" id="msg">
                    Modal body goes here
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-info">Save changes</button> --}}
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- end ini popup utk btn show /ajax --}}

@endsection
@section('headerjs')
    <script>
        function getDetailData(id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('transaction.showAjax') }}',
                data: '_token= <?php echo csrf_token(); ?>&id=' + id,
                success: function(data) {
                    $("#msg").html(data.msg);
                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });
        }
    </script>
@endsection
@section('footerjs')
    <script>
        $(document).ready(function() {
            $('#tabel-transaksi').DataTable();
        });
    </script>
@endsection
