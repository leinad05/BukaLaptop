<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>

<body>

    <div class="container">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('products.index') }}">
                                        Kembali ke dashboard
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-lg-2 col-sm-2 col-2 main-section">
                @can('cart-permission-product')
                    <a class="btn btn-secondary" href="#" role="button">Bandingkan Produk</a>
                @endcan
            </div>
            <div class="col-lg-10 col-sm-10 col-10 main-section">
                <div class="dropdown">
                    @can('cart-permission-product')
                        <button type="button" class="btn btn-info" data-toggle="dropdown">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
                            <span class="badge badge-pill badge-danger">
                                @if (session('cart'))
                                    {{ sizeof(session()->get('cart')) }}
                                @else
                                    0
                                @endif
                            </span>
                        </button>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    <div class="container page">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12 main-section">
                        <h3 class="text-center">Tabel Perbandingan</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-5 col-sm-5 col-5">

                        <div class="col-sm-12">
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option disabled selected>select category</option>
                                @foreach ($products as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-2">

                    </div>
                    <div class="col-lg-5 col-sm-5 col-5">
                        <div class="col-sm-12">
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option disabled selected>select category</option>
                                @foreach ($products as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- <div class="col-lg-5 col-sm-5 col-5">
                        <div class="row">
                            <div class="col-12">
                                <p class="text-center"></p>
                            </div>
                            <div class="col-12">
                                <p class="text-center">(Gambar produk 1)</p>
                            </div>
                            <div class="col-12">
                                <p class="text-center">(id produk)</p>
                            </div>
                            <div class="col-12">
                                <p class="text-center">(nama produk)</p>
                            </div>
                            <div class="col-12">
                                <p class="text-center">(deskripsi produk)</p>
                            </div>
                            <div class="col-12">
                                <p class="text-center">(harga produk)</p>
                            </div>
                            @foreach ($products as $item)
                                <div class="col-12">
                                    <p class="text-center">(spek lain)</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-2">
                        <div class="row">
                            <div class="col-12">
                                <p class="text-center"></p>
                            </div>
                            <div class="col-12">
                                <p class="text-center">(Gambar)</p>
                            </div>
                            <div class="col-12">
                                <p class="text-center">(id)</p>
                            </div>
                            <div class="col-12">
                                <p class="text-center">(nama)</p>
                            </div>
                            <div class="col-12">
                                <p class="text-center">(deskripsi)</p>
                            </div>
                            <div class="col-12">
                                <p class="text-center">(harga)</p>
                            </div>
                            @foreach ($products as $item)
                                <div class="col-12">
                                    <p class="text-center">info</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-5 col-5">
                        <div class="row">
                            <div class="col-12">
                                <p class="text-center"></p>
                            </div>
                            <div class="col-12">
                                <p class="text-center">(Gambar produk 1)</p>
                            </div>
                            <div class="col-12">
                                <p class="text-center">(id produk)</p>
                            </div>
                            <div class="col-12">
                                <p class="text-center">(nama produk)</p>
                            </div>
                            <div class="col-12">
                                <p class="text-center">(deskripsi produk)</p>
                            </div>
                            <div class="col-12">
                                <p class="text-center">(harga produk)</p>
                            </div>
                            @foreach ($products as $item)
                                <div class="col-12">
                                    <p class="text-center">(spek lain)</p>
                                </div>
                            @endforeach
                        </div>
                    </div> --}}

                    <div class="col-lg-5 col-sm-5 col-5">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products_spec->specifications as $s)
                                    <tr>
                                        <td class="text-center" id="p1_spec_{{ $loop->iteration }}">
                                            {{ $s->nama }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-2">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products_spec->specifications as $s)
                                    <tr>
                                        <td class="text-center">{{ $s->nama }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-5 col-sm-5 col-5">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products_spec->specifications as $s)
                                    <tr>
                                        <td class="text-center">{{ $s->nama }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @yield('scripts')
    <script>
        function getDataFirstEdit(id) {
            $.ajax({
                type: 'GET',
                url: '{{ route('products.getEditFormOnly') }}',
                data: 'id=' + id,
                success: function(data) {
                    $("#msgFormEdit").html(data.msg);
                }
            });
        }
    </script>
</body>

</html>
