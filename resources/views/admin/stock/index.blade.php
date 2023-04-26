@extends('admin.layout.index')


@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Stock</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Add Stock
            </legend>
            <form action="stock/store" class="form-horizontal" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-lg-2 control-label">Product</label>

                    <div class="col-lg-8">
                        <select name="code" class="form-control parProduct select">
                            <option value="">Product</option>
                            @foreach($products as $p)
                                <option value="{{$p->code}}">{{$p->title}} [{{$p->code}}]</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Quantity</label>

                    <div class="col-lg-8">
                        <input type="text" name="quantity" class="form-control num" placeholder="Quantity">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Purchase Price</label>

                    <div class="col-lg-8">
                        <input class="form-control" placeholder="Purchase Price" type="text" name="purchase_price">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Reference</label>

                    <div class="col-lg-8">
                        <input class="form-control" placeholder="Reference" type="text" name="reference">
                    </div>
                </div>


                <hr>
                <div class="form-group">
                    <div class="col-lg-8 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">Add Stock</button>
                    </div>
                </div>
            </form>
        </fieldset>

    </div>
@endsection

