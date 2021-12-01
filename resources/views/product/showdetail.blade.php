@extends('layouts.argon')
@section('judul_halaman')
    Detail Product
@endsection
@section('tempat_konten')
    <div class="row">
        <div class="col">

            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="mb-0">Detail Product</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="#" class="btn btn-sm btn-neutral">Edit</a>
                            <a href="#" class="btn btn-sm btn-neutral">Delete</a>
                        </div>
                    </div>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    <h4>Data</h4>
                                </th>
                                <th>
                                    <h4>Value</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Image</td>
                                <td>{{ $product->foto }}</td>
                            </tr>
                            <tr>
                                <td>Product ID</td>
                                <td>{{ $product->id }}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{ $product->nama }}</td>
                            </tr>
                            <tr>
                                <td>Brand</td>
                                <td>{{ $product->brand->nama_brand }}</td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>{{ $product->deskripsi }}</td>
                            </tr>

                            @foreach ($product->specifications as $s)
                                <tr>
                                    <td>{{ $s->nama }}</td>
                                    <td>{{ $s->pivot->keterangan }}</td>
                                </tr>
                            @endforeach
                            
                            <tr>
                                <td>Price</td>
                                <td>{{ $product->harga }}</td>
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
@endsection
@section('headerjs')

@endsection
@section('footerjs')

@endsection
