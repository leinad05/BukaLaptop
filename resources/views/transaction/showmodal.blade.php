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
                                        {{-- <img src="{{ asset('assets/images/' . $dp->image . '.jpg') }}" width="150" height="150"> --}}
                                        <img src="https://via.placeholder.com/150" alt="untuk coba modal">

                                    </div>
                                    <div class="col align-self-center">
                                        <b>Category: </b> {{ $dp->category->nama_kategori }} <br>
                                        <b>Price: </b> Rp {{ $dp->pivot->harga }} <br>
                                        <b>Quantity: </b> {{ $dp->pivot->quantity }} <br>
                                        <b>Total: </b> {{ $dp->pivot->quantity*$dp->pivot->harga }} <br>
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
