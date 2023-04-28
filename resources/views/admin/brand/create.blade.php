@extends('admin.layout.index')

@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Brand</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Add Brand
            </legend>
            <form action="{{route('brand.store')}}" class="form-horizontal" method="post">
                @csrf

                <div class="form-group">
                    <label class="col-lg-2 control-label">Title</label>

                    <div class="col-lg-7">
                        <input class="form-control" placeholder="Title" type="text" name="title" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Image</label>


                    <div class="col-lg-7">
                        <div class="input-group">
                           <span class="input-group-btn">
                             <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                               <i class="fa fa-picture-o"></i> Choose
                             </a>
                           </span>
                            <input id="thumbnail" class="form-control" type="text" name="image">
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;">
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </fieldset>

    </div>
@endsection

@section('script')
    @parent
    @include('admin.layout.js.lfm-standalone')
@stop
