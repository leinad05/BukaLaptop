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
                                <th>Data</th>
                                <th>Value</th>
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
                            <tr>
                                <td>Size</td>
                                <td>{{ $product->deskripsi }}</td>
                            </tr>
                            <tr>
                                <td>Resolution</td>
                                <td>{{ $product->deskripsi }}</td>
                            </tr>
                            <tr>
                                <td>RAM</td>
                                <td>{{ $product->deskripsi }}</td>
                            </tr>
                            <tr>
                                <td>Processor</td>
                                <td>{{ $product->deskripsi }}</td>
                            </tr>
                            <tr>
                                <td>OS</td>
                                <td>{{ $product->deskripsi }}</td>
                            </tr>
                            <tr>
                                <td>VGA Card</td>
                                <td>{{ $product->deskripsi }}</td>
                            </tr>
                            <tr>
                                <td>Storage</td>
                                <td>{{ $product->deskripsi }}</td>
                            </tr>
                            <tr>
                                <td>Weight</td>
                                <td>{{ $product->deskripsi }}</td>
                            </tr>
                            <tr>
                                <td>Battery</td>
                                <td>{{ $product->deskripsi }}</td>
                            </tr>
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
