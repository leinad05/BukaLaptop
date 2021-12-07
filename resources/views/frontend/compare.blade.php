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
                                    @can('access-permission-product')
                                    <a class="dropdown-item" href="{{ route('products.index') }}">
                                        Kembali ke dashboard
                                    </a>
                                    @endcan

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
                                    <option value="{{ $item->id }}" onclick="getData({{ $item->id }}, 1)">{{ $item->nama }}</option>
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
                                    <option value="{{ $item->id }}" onclick="getData({{ $item->id }}, 2)">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-5 col-sm-5 col-5">
                        <div class="col-sm-12 text-center">
                            <img src="https://via.placeholder.com/200x150?text=Image1" alt="" id="p1_foto" width="200" height="150">
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-2 text-center">
                    </div>
                    <div class="col-lg-5 col-sm-5 col-5">
                        <div class="col-sm-12">
                            <div class="col-sm-12 text-center">
                                <img src="https://via.placeholder.com/200x150?text=Image2" alt="" id="p2_foto" width="200" height="150">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-sm-5 col-5">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="p1_harga" class="text-center">-</td>
                                </tr>
                                @for ($i = 1; $i <=9; $i++)
                                    <tr>
                                        <td class="text-center" id="p1_spec_{{ $i }}">-</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-2">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">Harga</td>
                                </tr>
                                <tr>
                                    <td class="text-center">Size</td>
                                </tr>
                                <tr>
                                    <td class="text-center">Resolution</td>
                                </tr>
                                <tr>
                                    <td class="text-center">RAM</td>
                                </tr>
                                <tr>
                                    <td class="text-center">Processor</td>
                                </tr>
                                <tr>
                                    <td class="text-center">OS</td>
                                </tr>
                                <tr>
                                    <td class="text-center">VGA</td>
                                </tr>
                                <tr>
                                    <td class="text-center">Storage</td>
                                </tr>
                                <tr>
                                    <td class="text-center">Weight</td>
                                </tr>
                                <tr>
                                    <td class="text-center">Battery</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-5 col-sm-5 col-5">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="p2_harga" class="text-center">-</td>
                                </tr>
                                @for ($i = 1; $i <=9; $i++)
                                    <tr>
                                        <td class="text-center" id="p2_spec_{{ $i }}">-</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="/" class="btn btn-info">Back</a>
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

        function getData(id, compare){
            $.ajax({
                type: 'GET',
                url: '{{ route('products.getCompareData') }}',
                data: 'id=' + id,
                success: function(data) {
                    $('#p'+ compare +'_foto').attr("src", "img/"+data.product[0]);
                    $('#p'+ compare +'_harga').html(data.product[1]);
                    $('#p'+ compare +'_spec_'+ 1).html(data.data[0]);
                    $('#p'+ compare +'_spec_'+ 2).html(data.data[1]);
                    $('#p'+ compare +'_spec_'+ 3).html(data.data[2]);
                    $('#p'+ compare +'_spec_'+ 4).html(data.data[3]);
                    $('#p'+ compare +'_spec_'+ 5).html(data.data[4]);
                    $('#p'+ compare +'_spec_'+ 6).html(data.data[5]);
                    $('#p'+ compare +'_spec_'+ 7).html(data.data[6]);
                    $('#p'+ compare +'_spec_'+ 8).html(data.data[7]);
                    $('#p'+ compare +'_spec_'+ 9).html(data.data[8]);
                }
            })
        }
    </script>
</body>

</html>
