@extends('layouts.frontend')

@section('title', 'Cart')

@section('content')

    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:40%">Product</th>
            <th style="width:20%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
        <?php $total = 0; $totalakhir = "Rp. 0";?>
        @if(session('cart'))
            @foreach(session()->get('cart') as $key => $details)
            <?php 
                $total += $details['price'] * $details['quantity'];
                $totalakhir = "Rp. " . number_format($total,2,',','.'); 
            ?>
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs"><img src="{{ asset('img/'.$details['photo']) }}" width="100" height="100" alt="..." class="img-responsive"/></div>
                        <div class="col-sm-9">
                            <h6 class="nomargin">{{ $details['name'] }}</h6>
                        </div>
                    </div>
                </td>
                <?php
                    $harga = "Rp. " . number_format($details['price'],2,',','.');
                    $subtotal = "Rp. " . number_format($details['price'] * $details['quantity'],2,',','.');
                ?>
                <td data-th="Price">{{ $harga }}</td>
                <td data-th="Quantity">
                    <input type="number" class="form-control text-center" value="{{ $details['quantity'] }}" disabled>
                </td>
                <td data-th="Subtotal" class="text-center">{{ $subtotal }}</td>
                <td class="actions" data-th="">
                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                </td>
            </tr>
            @endforeach
        @endif
        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Total {{ $totalakhir }}</strong></td>
        </tr>
        <tr>
            <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total {{ $totalakhir }}</strong></td>
            <td>
                <a href="{{ route('submitcheckout') }}" class="btn btn-primary">Checkout <i class="fa fa-angle-right"></i></a>
                {{-- <a href="" class="btn btn-primary">Checkout <i class="fa fa-angle-right"></i></a> --}}
            </td>
        </tr>
        </tfoot>
    </table>

@endsection