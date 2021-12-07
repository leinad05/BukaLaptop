<div>
    <div class="card">
        <div class="card-header border-0 bg-primary">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-0 text-center text-white">Transaction Id : {{ $data->id }}</h3>
                </div>
            </div>
        </div>
        <div>
            <div class="row">
                @foreach ($data->products as $dp)
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header text-center">
                                <h5>{{ $dp->nama }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5">
                                        <img src="{{ asset('img/' . $dp->foto) }}" width="150" height="150">
                                    </div>
                                    <div class="col align-self-center">
                                        {{-- bug kena soft delete --}}
                                        {{-- <b>Category: </b> {{ $dp->category->nama_kategori }} <br> --}}

                                        <?php
                                            $harga = "Rp. " . number_format($dp->pivot->harga,2,',','.');
                                            $total = "Rp. " . number_format($dp->pivot->quantity*$dp->pivot->harga,2,',','.');
                                        ?>
                                        <b>Price: </b> {{ $harga }} <br>
                                        <b>Quantity: </b> {{ $dp->pivot->quantity }} <br>
                                        <b>Total: </b> {{ $total }} <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
