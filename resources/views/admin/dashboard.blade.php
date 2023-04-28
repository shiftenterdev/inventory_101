<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Shop</title>
    <base href="/"/>
    <link rel="icon" type="image/png" href="shop.png">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/css/bb.css">
    <link rel="stylesheet" href="admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin/css/ionicons.min.css">
</head>

<body>

<div class="waiting"><i class="fa fa-spinner fa-pulse"></i></div>

@include('admin.layout.header')

@include('admin.layout.toast')

<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div class="homcon">
            <div class="row">
                <div class="col-md-2 ball">
                    <div class="n">{{$products}}</div>
                    <a href="{{route('product.index')}}"><img src="{{asset('imgs/packing.svg')}}" alt=""><span>Product</span></a>
                </div>
                <div class="col-md-2 ball">
                    <div class="n">{{$foods}}</div>
                    <a href="{{route('food.index')}}"><img src="{{asset('imgs/food.svg')}}" alt=""><span>Food</span></a>
                </div>
                <div class="col-md-2 ball">
                    <div class="n">{{$tables}}</div>
                    <a href="{{route('table.index')}}"><img src="{{asset('imgs/table.svg')}}" alt=""><span>Table</span></a>
                </div>
                <div class="col-md-2 ball">
                    <div class="n">{{$categories}}</div>
                    <a href="{{route('category.index')}}"><img src="{{asset('imgs/category.svg')}}" alt=""><span>Category</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="{{route('discount.index')}}"><img src="{{asset('imgs/percentage.svg')}}" alt=""><span>Discount</span></a>
                </div>
                <div class="col-md-2 ball">
                    <div class="n">{{$brands}}</div>
                    <a href="{{route('brand.index')}}"><img src="{{asset('imgs/creative-market.svg')}}" alt=""><span>Brand</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="report"><img src="{{asset('imgs/line-chart.svg')}}" alt=""><span>Report</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="analysis"><img src="{{asset('imgs/analytics.svg')}}" alt=""><span>Analysis</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="purchase"><img src="{{asset('imgs/buy.svg')}}" alt=""><span>Purchase</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="{{route('sales.index')}}"><img src="{{asset('imgs/sell.svg')}}" alt=""><span>Sales</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="{{route('payment.index')}}"><img src="imgs/check.svg" alt=""><span>{{__('Payment')}}</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="sells-history"><img src="imgs/order.svg" alt=""><span>{{__('History')}}</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="{{route('employee.index')}}"><img src="{{asset('imgs/employees.svg')}}" alt=""><span>Employee</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="{{route('stock.index')}}"><img src="{{asset('imgs/warehouse.svg')}}" alt=""><span>Stock</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="{{route('refund.index')}}"><img src="{{asset('imgs/money-refund.svg')}}" alt=""><span>Refund</span></a>
                </div>
                <div class="col-md-2 ball">
                    <div class="n">{{$customers}}</div>
                    <a href="{{route('customers.index')}}"><img src="{{asset('imgs/employee.svg')}}"><span>Customer</span></a>
                </div>
                <div class="col-md-2 ball">
                    <a href="{{route('settings.index')}}"><img src="{{asset('imgs/settings.svg')}}" alt=""><span>Setting</span></a>
                </div>
                <div class="col-md-2 ball">
                    <div class="n">{{$users}}</div>
                    <a href="{{route('user.index')}}"><img src="{{asset('imgs/users.svg')}}" alt=""><span>User</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
    <script src="admin/js/jquery.min.js"></script>
    <script src="admin/js/bootstrap.min.js"></script>
    <script src="admin/js/bb.js"></script>
@show

</body>

</html>


