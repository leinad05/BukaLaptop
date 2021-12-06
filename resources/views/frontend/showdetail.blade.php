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
                <h3 class="card-title">Rounded Chair</h3>
                <h6 class="card-subtitle">globe type chair for rest</h6>
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-6">
                        <div class="white-box text-center"><img src="https://via.placeholder.com/430x600/00CED1/000000" class="img-responsive"></div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-6">
                        <h4 class="box-title mt-5">Product description</h4>
                        <p>Lorem Ipsum available,but the majority have suffered alteration in some form,by injected humour,or randomised words which don't look even slightly believable.but the majority have suffered alteration in some form,by injected humour</p>
                        <h2 class="mt-5">
                            $153<small class="text-success">(36%off)</small>
                        </h2>
                        <button class="btn btn-dark btn-rounded mr-1" data-toggle="tooltip" title="" data-original-title="Add to cart">
                            <i class="fa fa-shopping-cart"></i>
                        </button>
                        <button class="btn btn-primary btn-rounded">Buy Now</button>
                        <h3 class="box-title mt-5">Key Highlights</h3>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-check text-success"></i>Sturdy structure</li>
                            <li><i class="fa fa-check text-success"></i>Designed to foster easy portability</li>
                            <li><i class="fa fa-check text-success"></i>Perfect furniture to flaunt your wonderful collectibles</li>
                        </ul>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3 class="box-title mt-5">General Info</h3>
                        <div class="table-responsive">
                            <table class="table table-striped table-product">
                                <tbody>
                                    <tr>
                                        <td width="390">Brand</td>
                                        <td>Stellar</td>
                                    </tr>
                                    <tr>
                                        <td>Delivery Condition</td>
                                        <td>Knock Down</td>
                                    </tr>
                                    <tr>
                                        <td>Seat Lock Included</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Type</td>
                                        <td>Office Chair</td>
                                    </tr>
                                    <tr>
                                        <td>Style</td>
                                        <td>Contemporary&amp;Modern</td>
                                    </tr>
                                    <tr>
                                        <td>Wheels Included</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Upholstery Included</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Upholstery Type</td>
                                        <td>Cushion</td>
                                    </tr>
                                    <tr>
                                        <td>Head Support</td>
                                        <td>No</td>
                                    </tr>
                                    <tr>
                                        <td>Suitable For</td>
                                        <td>Study&amp;Home Office</td>
                                    </tr>
                                    <tr>
                                        <td>Adjustable Height</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Model Number</td>
                                        <td>F01020701-00HT744A06</td>
                                    </tr>
                                    <tr>
                                        <td>Armrest Included</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Care Instructions</td>
                                        <td>Handle With Care,Keep In Dry Place,Do Not Apply Any Chemical For Cleaning.</td>
                                    </tr>
                                    <tr>
                                        <td>Finish Type</td>
                                        <td>Matte</td>
                                    </tr>
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