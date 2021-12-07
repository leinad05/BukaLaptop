@extends('layouts.frontend')

@section('title', 'Cart')

@section('content')

    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:10%" class="text-center">Image</th>
            <th style="width:40%" class="text-center">Name</th>
            <th style="width:20%" class="text-center">Price</th>
            <th style="width:10%" class="text-center">Quantity</th>
            <th style="width:20%" class="text-center">Subtotal</th>
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
                <td data-th="Image" class="text-center">
                    <img src="{{ asset('img/'.$details['photo']) }}" width="100" height="100" alt="..." class="img-responsive"/>
                </td>
                <td data-th="Name" class="text-center">
                    <h6 class="nomargin">{{ $details['name'] }}</h6>
                </td>
                <?php
                    $harga = "Rp. " . number_format($details['price'],2,',','.');
                    $subtotal = "Rp. " . number_format($details['price'] * $details['quantity'],2,',','.');
                ?>
                <td data-th="Price" class="text-center">{{ $harga }}</td>
                <td data-th="Quantity" class="text-center">
                    {{ $details['quantity'] }}
                </td>
                <td data-th="Subtotal" class="text-center">{{ $subtotal }}</td>
            </tr>
            @endforeach
        @endif
        </tbody>
        <tfoot>
        <tr>
            <td class="text-center"><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td class="hidden-xs"></td>
            <td colspan="2" class="text-right"><strong>Total {{ $totalakhir }}</strong></td>
            <td class="text-center">
                <a href="{{ route('submitcheckout') }}" class="btn btn-primary">Checkout <i class="fa fa-angle-right"></i></a>
                {{-- <a href="" class="btn btn-primary">Checkout <i class="fa fa-angle-right"></i></a> --}}
            </td>
        </tr>
        </tfoot>
    </table>

@endsection