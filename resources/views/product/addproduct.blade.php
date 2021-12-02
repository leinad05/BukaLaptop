@extends('layouts.argon')
@section('judul_halaman')
    Add Product
@endsection
@section('tempat_konten')


    <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-0">Add Product</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group" >
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name" placeholder="product's name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" class="form-control" id="description"
                                placeholder="description">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="releaseyear" class="col-sm-2 col-form-label">Release Year</label>
                        <div class="col-sm-10">
                            <input type="text" name="releaseyear" class="form-control" id="releaseyear" placeholder="release year">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="text" name="harga" class="form-control" id="harga"
                                placeholder="Price">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                        <div class="col-sm-10">
                            <input type="text" name="stock" class="form-control" id="stock" placeholder="stock">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input type="text" name="image" class="form-control" id="image" placeholder="11" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kategori" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option disabled selected>select category</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="brand" class="col-sm-2 col-form-label">Brand</label>
                        <div class="col-sm-10">
                            <select name="brand_id" id="brand_id" class="form-control" required>
                                <option disabled selected>select brand</option>
                                @foreach ($brands as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_brand }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-primary">Add</button>
                            <a href="" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- END Portlet PORTLET-->
@endsection
@section('headerjs')

@endsection
@section('footerjs')
    <script>

    </script>
@endsection
