@extends('layouts.argon')
@section('judul_halaman')
    Confimrmation
@endsection
@section('tempat_konten')

    <div class="card">
        <div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0 text-center">Transaction Id: {{ $data->id }}</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort text-center" data-sort="No">No.</th>
                                        <th scope="col" class="sort text-center" data-sort="image"></th>
                                        <th scope="col" class="sort text-center" data-sort="budget">Name</th>
                                        <th scope="col" class="sort text-center" data-sort="budget">Product Id</th>
                                        <th scope="col" class="sort text-center" data-sort="status">Price</th>
                                        <th scope="col" class="sort text-center">Quantity</th>
                                        <th scope="col" class="sort text-center" data-sort="completion">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @php
                                        $grandtotal = 0;
                                    @endphp
                                    @foreach ($data->products as $dp)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                <img src="{{ asset('img/' . $dp->foto) }}" width="100" height="100">
                                            </td>
                                            <td class="budget text-center">
                                                {{ $dp->nama }}
                                            </td>
                                            <td class="budget text-center">
                                                {{ $dp->id }}
                                            </td>
                                            <?php
                                                $harga = "Rp. " . number_format($dp->pivot->harga,2,',','.');
                                                $total = "Rp. " . number_format($dp->pivot->quantity*$dp->pivot->harga,2,',','.');
                                            ?>
                                            <td class="text-center">
                                                {{ $harga }}
                                            </td>
                                            <td class="text-center">
                                                {{ $dp->pivot->quantity }}
                                            </td>
                                            <td class="text-center">
                                                {{ $total }}
                                            </td>
                                            @php
                                                $grandtotal += $dp->pivot->quantity * $dp->pivot->harga;
                                                $grand = "Rp. " . number_format($grandtotal,2,',','.');
                                            @endphp
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-center">
                                            <h4>GrandTotal:</h4>
                                        </td>
                                        <td class="text-center">
                                            <h4>{{ $grand }}</h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer py-4">
                            <div class="row">
                                <div class="col-12 text-right">
                                    @if ($data->status != 'Accepted')
                                        <a class="btn btn-sm btn-success"
                                            href="{{ url('transactions/acceptTransaction/' . $data->id) }}">Accept</a>
                                    @else
                                        <h4 class="text-success">Order has been accepted</h4>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('headerjs')

@endsection
@section('footerjs')

@endsection
