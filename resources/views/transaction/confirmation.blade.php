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
                                    @foreach ($data->products as $dp)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                <img src="https://via.placeholder.com/50" alt="untuk coba modal">
                                            </td>
                                            <td class="budget text-center">
                                                {{ $dp->nama }}
                                            </td>
                                            <td class="budget text-center">
                                                {{ $dp->id }}
                                            </td>
                                            <td class="text-center">
                                                Rp {{ $dp->pivot->harga }}
                                            </td>
                                            <td class="text-center">
                                                {{ $dp->pivot->quantity }}
                                            </td>
                                            <td class="text-center">
                                                {{ $dp->pivot->quantity * $dp->pivot->harga }}
                                            </td>
                                        </tr>
                                    @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center"><h4>GrandTotal: </h4></td>
                                            <td class="text-center">Rp. 9999999</td>
                                        </tr>
                                </tbody>
                                
                            </table>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer py-4">
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
