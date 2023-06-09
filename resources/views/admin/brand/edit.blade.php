@extends('admin.layout.index')

@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Brand</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Update Brand
            </legend>
            <form action="{{route('brand.update',$brand->id)}}" class="form-horizontal" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="col-lg-2 control-label">{{__('Title')}}</label>

                    <div class="col-lg-6">
                        <input class="form-control" placeholder="Title" type="text" name="title" value="{{$brand->title}}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">{{__('Image')}}</label>


                    <div class="col-lg-7">
                        <div class="input-group">
                           <span class="input-group-btn">
                             <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                               <i class="fa fa-picture-o"></i> Choose
                             </a>
                           </span>
                            <input id="thumbnail" class="form-control" type="text" name="image" value="{{$brand->image}}">
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;" src="{{$brand->image}}">
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
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
