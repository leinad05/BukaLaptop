@extends('layouts.argon')
@section('judul_halaman')
    Edit Product
@endsection
@section('tempat_konten')
    <div class="row">
        <div class="col">

            <div class="card">
                <!-- Light table -->
                <div class="table-responsive">
                    <form action="{{ route('products.update2', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')
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
                                
                                @foreach ($product->specifications as $s)
                                    <tr>
                                        <td>{{ $s->nama }}</td>
                                        <td>
                                            <div class="col-sm-10">
                                                <input type="text" name="{{ $s->nama }}" class="form-control"
                                                    placeholder="{{ $s->nama }}" value = "{{ $s->pivot->keterangan }}">
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <a href="" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
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
