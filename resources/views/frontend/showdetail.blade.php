{{-- <h1>{{ $product->nama }}</h1>

<table>
    <thead>
        <tr>
            <th>Spek</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($product->specifications as $s)
        <tr>
            <td class="text-center"><b>{{ $s->nama }}</b></td>
            <td>{{ $s->pivot->keterangan }}</td>
        </tr>
        @endforeach
    </tbody>
</table> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            background-color: #edf1f5;
            margin-top:20px;
        }
        .card {
            margin-bottom: 30px;
        }
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid transparent;
            border-radius: 0;
        }
        .card .card-subtitle {
            font-weight: 300;
            margin-bottom: 10px;
            color: #8898aa;
        }
        .table-product.table-striped tbody tr:nth-of-type(odd) {
            background-color: #f3f8fa!important
        }
        .table-product td{
            border-top: 0px solid #dee2e6 !important;
            color: #728299!important;
        }
    </style>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <a href="/"><i class="fa fa-arrow-left" style="color: black"></i></a>
                <h3 class="card-title" style="text-align: center">{{ $product->nama }}</h3> <br>
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-6">
                        <div class="white-box text-center"><img src="" class="img-responsive" height="200" width="200"></div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-6">
                        <h4 class="box-title mt-5">Product Description</h4>
                        <p>{{ $product->deskripsi }}</p>
                        <h2 class="mt-5">
                            Rp. {{ $product->harga }}
                        </h2>
                        <a href="{{ url('add-cart/' . $product->id) }}" class="btn btn-dark btn-rounded mr-1" role="button">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3 class="box-title mt-5">Specification</h3>
                        <div class="table-responsive">
                            <table class="table table-striped table-product">
                                <tbody>
                                    @foreach ($product->specifications as $s)
                                    <tr>
                                        <td width="390"><b>{{ $s->nama }}</b></td>
                                        <td>{{ $s->pivot->keterangan }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>