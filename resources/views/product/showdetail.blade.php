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
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-neutral">Edit</a>
                        </div>
                    </div>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <h4>specification</h4>
                                </th>
                                <th>
                                    <h4>Detail</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center"><b>Image</b></td>
                                <td>{{ $product->foto }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><b>Product ID</b></td>
                                <td>{{ $product->id }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><b>Name</b></td>
                                <td>{{ $product->nama }}</td>
                            </tr>

                            {{-- kenak softdelet error --}}
                            {{-- <tr>
                                <td class="text-center"><b>Brand</b></td>
                                <td>{{ $product->brand->nama_brand }}</td>
                            </tr> --}}


                            <tr>
                                <td class="text-center"><b>Description</b></td>
                                <td>{{ $product->deskripsi }}</td>
                            </tr>

                            @foreach ($product->specifications as $s)
                                <tr>
                                    <td class="text-center"><b>{{ $s->nama }}</b></td>
                                    <td>{{ $s->pivot->keterangan }}</td>
                                </tr>
                            @endforeach
                            
                            <tr>
                                <td class="text-center"><b>Price</b></td>
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
