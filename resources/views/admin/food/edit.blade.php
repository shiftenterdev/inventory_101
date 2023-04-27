@extends('admin.layout.index')


@section('content')
    <ul class="breadcrumb">
        <li><a href="#">{{__('Home')}}</a></li>
        <li class="active">{{__('Food')}}</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Add Food
            </legend>
            <form action="{{route('food.update',$food->id)}}" class="form-horizontal" method="post">
                @csrf

                <div class="form-group">
                    <label class="col-lg-2 control-label">{{__('Category')}}</label>

                    <div class="col-lg-8">
                        <select name="category_id" class="form-control select" required>
                            <option value="">{{__('Select Category')}}</option>
                            @foreach($categories as $c)
                                <option value="{{$c->id}}">{{$c->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-2 control-label">{{__('Title')}}</label>

                    <div class="col-lg-8">
                        <input class="form-control" placeholder="{{__('Title')}}" type="text" name="title">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">{{__('Description')}}</label>

                    <div class="col-lg-8">
                        <textarea name="description" class="form-control" placeholder="Description" rows="10"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">{{__('Price')}}</label>

                    <div class="col-lg-8">
                        <input class="form-control" placeholder="{{__('Price')}}" type="text" name="price">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">{{__('Status')}}</label>

                    <div class="col-lg-8">
                        <div class="radio">
                            <input name="status" id="radio1" value="1" checked="" type="radio">
                            <label for="radio1">
                                <mark></mark>
                                {{__('Active')}}
                            </label>
                        </div>
                        <div class="radio">
                            <input name="status" id="radio2" value="2" type="radio">
                            <label for="radio2">
                                <mark></mark>
                                {{__('Inactive')}}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Image</label>


                    <div class="col-lg-8">
                        <input id="thumbnail" class="form-control" type="text" name="image" data-input="thumbnail" data-preview="holder">
                        <img id="holder" style="margin-top:15px;max-height:100px;">
                    </div>
                </div>

                <hr>
                <div class="form-group">
                    <div class="col-lg-8 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">Update Food</button>
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

