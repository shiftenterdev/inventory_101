@extends('admin.layout.index')


@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Product</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Update Product
            </legend>
            <form action="product/update/{{$product->id}}" class="form-horizontal" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label class="col-lg-2 control-label">Title</label>

                    <div class="col-lg-8">
                        <input class="form-control" placeholder="Title" type="text" name="title"
                               value="{{$product->title}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Description</label>

                    <div class="col-lg-8">
                        <textarea name="description" class="form-control"
                                  placeholder="Description">{{$product->description}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Purchase Price</label>

                    <div class="col-lg-8">
                        <input class="form-control" placeholder="Purchase Price" type="text" name="purchase_price"
                               value="{{$product->purchase_price}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Sell Price</label>

                    <div class="col-lg-8">
                        <input class="form-control" placeholder="Sell Price" type="text" name="sell_price"
                               value="{{$product->sell_price}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Category</label>

                    <div class="col-lg-8">
                        <select name="category_id[]" class="form-control parCat select" required multiple>
                            <option value="">Select Category</option>
                            @foreach($categories as $c)
                                <option value="{{$c->id}}" {{in_array($c->id,$product->category_ids)?'selected':''}}>{{$c->full_category}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Brand</label>

                    <div class="col-lg-8">
                        <select name="brand_id" class="form-control">
                            <option value="">Select Brand</option>
                            @foreach($brands as $b)
                                <option value="{{$b->id}}" {{$product->brand_id==$b->id?'selected':''}}>{{$b->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-2 control-label">Quantity</label>

                    <div class="col-lg-8">
                        <input class="form-control" placeholder="Quantity" type="number" name="quantity" value="{{$product->quantity}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Status</label>

                    <div class="col-lg-8">
                        <div class="col-lg-8">
                            <div class="radio">
                                <input name="status" id="radio1" value="1" checked="" type="radio" {{$product->status==1?'checked':''}}>
                                <label for="radio1">
                                    <mark></mark>
                                    Active
                                </label>
                            </div>
                            <div class="radio">
                                <input name="status" id="radio2" value="2" type="radio" {{$product->status==2?'checked':''}}>
                                <label for="radio2">
                                    <mark></mark>
                                    Inactive
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Image</label>


                    <div class="col-lg-8">
                        <div class="input-group">
                           <span class="input-group-btn">
                             <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                               <i class="fa fa-picture-o"></i> Choose
                             </a>
                           </span>
                            <input id="thumbnail" class="form-control" type="text" name="image" value="{{$product->image}}">
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;" src="{{$product->image}}">
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <div class="col-lg-8 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                </div>
            </form>
        </fieldset>

    </div>
@endsection
@section('script')
    @parent
    <script src="https://cdn.ckeditor.com/4.9.2/basic/ckeditor.js"></script>
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        CKEDITOR.replace( 'description' );
        var prefix = "{{config('lfm.url_prefix')}}";
        $('#lfm').filemanager('image', {prefix: prefix});
    </script>
@stop

