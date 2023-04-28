@extends('admin.layout.index')

@section('content')
    <style>
        .pl {
            padding: 0;
            list-style: none;
        }

        .pl li {
            border: 1px solid #ddd;
            border-bottom: none;
            /*padding: 7px 10px;*/
        }

        .pl li:hover {
            background: #efefef;
            /*cursor: pointer;*/
        }

        .pl li:last-child {
            border-bottom: 1px solid #ddd;
        }

        .pl li a {
            color: #444;
            display: block;
            text-decoration: none;
            font-weight: 600;
            padding: 7px 10px;
        }

        small {
            font-size: 14px;
            text-decoration: underline;
        }

    </style>
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Purchase</li>
    </ul>
    <fieldset style="margin-bottom: 200px">

        <form action="{{route('purchase.store')}}" method="post" id="customerForm" class="form-horizontal">
            {{csrf_field()}}
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">
                            Popular Products
                            <button class="bt btn-info btn-xs add-new-product">Add New Product</button>
                        </h2>
                    </div>
                    <div class="panel-body">
                        <ul class="pl">
                            @foreach($products as $p)
                                <li><a href="javascript:" data-code="{{$p->code}}" class="top-product">{{$p->title}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Customer Details</h2>
                    </div>
                    <div class="panel-body">
                        @include('admin.common.invoice_head')
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">
                            Product List
                        </h2>
                    </div>
                    <div class="panel-body">
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
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        @endif
                        <div class="text-center">
                            <button type="button" class="btn btn-danger openRight"><i class="fa fa-money"></i> Payment
                            </button>
                            <button type="submit" class="btn btn-info">Save Invoice</button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </form>
    </fieldset>
    @extends('admin.layout.right',['title'=>'Order Payment'])
    @section('slot')
        <form action="{{route('payment.store')}}" class="form-horizontal" method="post">
            {{csrf_field()}}
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
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New Product</h4>
                </div>
                <div class="modal-body">
                    <form action="product/store" class="form-horizontal save-product" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Title</label>

                            <div class="col-lg-9">
                                <input class="form-control" placeholder="Title" type="text" name="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Category</label>

                            <div class="col-lg-9">
                                <select name="category_id[]" class="form-control select" required multiple>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $c)
                                        <option value="{{$c->id}}">{{$c->full_category}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Brand</label>

                            <div class="col-lg-9">
                                <select name="brand_id" class="form-control select">
                                    <option value="">Select Brand</option>
                                    @foreach($brands as $b)
                                        <option value="{{$b->id}}">{{$b->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-9 col-lg-offset-3">
                                <button type="submit" class="btn btn-primary">Save Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    @parent
    <script>

        let INVOICE_NO = "{{request('invoice_no')}}",
            productListSelector = $('#productList');

        let refreshProductTable = function (formData) {
            axios.put('purchase/update', formData).then(response => {
                reloadTable();
            });
        }

        $("#cMobile").autocomplete({
            source: function (request, response) {
                $.post("customers/search", request, response);
            },
            minLength: 2,
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

        $('.top-product').on('click', function () {
            load.on();
            let formData = {
                code: $(this).data('code'),
                invoice_no: INVOICE_NO,
                type: 'add',
                _token: $('meta[name="csrf-token"]').attr('content')
            };
            axios.put('purchase/update', formData).then(function (response) {
                $('.spo').val('');
                reloadTable();
            }).catch(function (error) {
                console.log(error);
            });
        });

        productListSelector.on('input', '#product', function () {
            $(this).autocomplete({
                source: function (request, response) {
                    $.post("product/search", {invoice_no: INVOICE_NO, term: request.term}, response);
                },
                minLength: 2,
                select: function (event, ui) {
                    var formData = {
                        code: ui.item.code,
                        invoice_no: INVOICE_NO,
                        type: 'add'
                    };
                    $.post('purchase/update', formData).done(function (result) {
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
            if ($(this).val() !== '') {
                load.on();
                let product = {
                    code: $(this).val()
                };

                axios.post('purchase/product/add',product).then(response => {
                    $('.spo').val('');
                    reloadTable();
                })
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

        productListSelector.on('change', '.price', function () {
            load.on();
            var formData = {
                code: $(this).data('code'),
                invoice_no: INVOICE_NO,
                type: 'price',
                price: $(this).val()
            };
            refreshProductTable(formData)
        });

        productListSelector.on('change', '.quantity', function () {
            load.on();
            var formData = {
                code: $(this).data('code'),
                invoice_no: INVOICE_NO,
                type: 'quantity',
                quantity: $(this).val()
            };
            refreshProductTable(formData);
        });

        productListSelector.on('change', '.discount', function () {
            load.on();
            var formData = {
                code: $(this).data('code'),
                invoice_no: INVOICE_NO,
                type: 'product_discount',
                discount: $(this).val()
            };
            axios.put('purchase/update', formData).then(response => {
                reloadTable();
            });
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

        productListSelector.on('click', '.btn-quantity', function () {
            let type = $(this).data('type');
            let field = $(this).data('field');
            field = $('input[name="' + field + ']"]');
            let current_value = parseFloat(field.val());
            if (type === 'minus') {
                field.val(current_value - 1);
            } else {
                field.val(current_value + 1);
            }
        });

        productListSelector.on('change', 'input[name=delivery_charge]', function () {
            load.on();
            let formData = {
                invoice_no: INVOICE_NO,
                type: 'delivery_charge',
                delivery_charge: $(this).val()
            };
            axios.put('purchase/update', formData).then(response => {
                reloadTable();
            });
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

        $('.add-new-product').on('click', function () {
            $('#myModal').modal('show');
        });

        $('form.save-product').on('submit', function (e) {
            e.preventDefault();
            let data = $(this).serializeArray();
            let url = $(this).attr('action');
            $('#myModal').modal('hide');
            $.post(url, data, function (result) {
                alert(result);
            });
        })
    </script>
@endsection
