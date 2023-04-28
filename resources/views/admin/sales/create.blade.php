@extends('admin.layout.index')

@section('content')
    <style>
        .pl{
            padding: 0;
            list-style: none;
        }
        .pl li{
            border: 1px solid #149c82;
            border-bottom: none;
            padding: 7px 10px;
        }
        .pl li:hover{
            background: #efefef;
            /*cursor: pointer;*/
        }
        .pl li:last-child{
            border-bottom: 1px solid #149c82;
        }
        .pl li a{
            color: #149c82;
            display: block;
            text-decoration: none;
        }

    </style>

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Sell</li>
    </ul>
    <fieldset style="margin-bottom: 200px">
        <legend>
            Customer Info
        </legend>
        <form action="{{route('sales.store')}}" method="post" id="customerForm" class="form-horizontal" autocomplete="off">
            @include('admin.common.invoice_head')
            <div class="col-md-3">
                <legend>
                    Popular Products
                </legend>
                <ul class="pl">
                    @foreach($products as $p)
                        <li><a href="javascript:" data-code="{{$p->code}}" class="top-product">{{$p->title}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-9">
                <legend>
                    Product List
                </legend>

                <div class="row">
                    <div class="col-md-12">
                        <div id="productList">
                            @include('admin.common.product_list')
                        </div>
                        @if(count($invoice->payments)>0)
                            <div id="payment">
                                <legend>Payment</legend>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr class="t-imp">
                                        <th>SL</th>
                                        <th>Amount</th>
                                        <th>Method</th>
                                        <th>Trx No</th>
                                        <th>Date</th>
                                        <th>Option</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($invoice->payments as $k => $p)
                                        <tr>
                                            <td>{{$k+1}}</td>
                                            <td>{{$p->amount}}</td>
                                            <td>{{$p->method}}</td>
                                            <td>{{$p->trx_id}}</td>
                                            <td>{{$p->updated_at}}</td>
                                            <td><a href="payment/delete/{{$p->id}}" class="btn btn-danger"><i
                                                            class="fa fa-times"></i></a></td>
                                        </tr>
                                    @endforeach
                                </table>
                                </table>
                            </div>
                        @endif

                    </div>
                </div>

                <div class="text-center">
                    <button type="button" class="btn btn-danger openRight"><i class="fa fa-money"></i> Payment
                    </button>
                    <button type="submit" class="btn btn-primary">Save Invoice</button>
                </div>
            </div>

        </form>


    </fieldset>

    @extends('admin.layout.right',['title'=>'Order Payment'])
@section('slot')
    <form action="payment/store" class="form-horizontal" method="post">
        @csrf
        <input type="hidden" name="invoice_no" value="{{request()->invoice}}">
        <div class="first-option">
            <div class="form-group">
                <label for="">Amount</label>
                <input type="text" name="amount" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Method</label>
                <select name="payment_method" id="" class="form-control select">
                    <option value="Cash">Cash</option>
                    <option value="Card">Card</option>
                    <option value="bKash">bKash</option>
                    <option value="Cheque">Cheque</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Trx ID/Chq No</label>
                <input type="text" name="trx_id" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Other Info</label>
                <input type="text" class="form-control" name="info">
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save Payment</button>
        </div>
    </form>
@stop
@endsection

@section('script')
    @parent
    <script>
        let INVOICE_NO = "{{request('invoice_no')}}",
            productListSelector = $('#productList');

        let refreshProductTable = function (formData) {
            axios.put('purchase/update', formData).then(() => {
                reloadTable();
            });
        }

        $("#cMobile").autocomplete({
            source: function (request, response) {
                $.post("customers/search", request, response);
            },
            minLength: 1,
            focus: function (event, ui) {
                $('input[name=mobile]').val(ui.item.mobile);
                return false;
            },
            select: function (event, ui) {
//                alert(ui.item.address);
                $('input[name=mobile]').val(ui.item.mobile);
                $('input[name=address]').val(ui.item.address);
                $('input[name=name]').val(ui.item.name);
                $('input[name=email]').val(ui.item.email);
                return false;
            },
            response: function (event, ui) {
                if (!ui.content.length) {
                    ui.content.push({id: "", mobile: "No results found", name: ""});
                }
            }
        }).autocomplete("instance")._renderItem = function (ul, item) {
            return $("<li>")
                .append("<div>" + item.mobile + " <ins>" + item.name + "</ins></div>")
                .appendTo(ul);
        };

        $('.top-product').on('click',function(){
            load.on();
            let formData = {
                code: $(this).data('code'),
                invoice_no: INVOICE_NO,
                type: 'add'
            };
            axios.put('sales/update', formData).then(()=> {
                $('.spo').val('');
                reloadTable();
            });
        });

        productListSelector.on('input', '#product', function () {
            $(this).autocomplete({
                source: function (request, response) {
                    $.post("product/search", {invoice_no: INVOICE_NO, term: request.term}, response);
                },
                minLength: 1,
                select: function (event, ui) {
                    let formData = {
                        code: ui.item.code,
                        invoice_no: INVOICE_NO,
                        type: 'add'
                    };
                    axios.put('sales/update', formData).then(()=> {
                        $('.spo').val('');
                        reloadTable();
                    });
                },
                response: function (event, ui) {
                    if (!ui.content.length) {
                        ui.content.push({id: "", title: "No results found", code: ""});
                    }
                }
            }).autocomplete("instance")._renderItem = function (ul, item) {
                return $("<li>")
                    .append("<div>" + item.title + " <ins>" + item.code + "</ins></div>")
                    .appendTo(ul);
            };
        });

        productListSelector.on('change', '#pro_code', function () {
            // e.preventDefault();
            if ($(this).val() !== '') {
                load.on();
                let product = {
                    code: $(this).val(),
                    _token: $('meta[name="csrf-token"]').attr('content')
                };

                axios.post('sell/product/add',product).then(() => {
                    $('.spo').val('');
                    reloadTable();
                });
            }
        });

        productListSelector.on('click', '.remove', function () {
            load.on();
            let formData = {
                code: $(this).data('code'),
                invoice_no: INVOICE_NO,
                type: 'remove'
            };
            refreshProductTable(formData);
        });

        productListSelector.on('change', '.quantity', function () {
            load.on();
            let formData = {
                code: $(this).data('code'),
                invoice_no: INVOICE_NO,
                type: 'quantity',
                quantity: $(this).val()
            };
            refreshProductTable(formData);
        });

        productListSelector.on('change', '.discount', function () {
            load.on();
            let formData = {
                code: $(this).data('code'),
                invoice_no: INVOICE_NO,
                type: 'product_discount',
                discount: $(this).val()
            };
            refreshProductTable(formData);
        });
        productListSelector.on('change', 'input[name=other_discount]', function () {
            load.on();
            let formData = {
                invoice_no: INVOICE_NO,
                type: 'other_discount',
                other_discount: $(this).val()
            };
            refreshProductTable(formData);
        });

        productListSelector.on('change', 'input[name=tax]', function () {
            load.on();
            let formData = {
                invoice_no: INVOICE_NO,
                type: 'tax',
                tax: $(this).val()
            };
            refreshProductTable(formData);
        });

        productListSelector.on('change', 'input[name=delivery_charge]', function () {
            load.on();
            let formData = {
                invoice_no: INVOICE_NO,
                type: 'delivery_charge',
                delivery_charge: $(this).val()
            };
            refreshProductTable(formData);
        });

        let reloadTable = function () {
            let formData = {
                invoice_no: INVOICE_NO,
                type: 'products'
            };
            axios.put('purchase/update', formData).then(response => {
                $('#productList').html(response.data);
                load.off();
            });
        }
    </script>
@endsection
