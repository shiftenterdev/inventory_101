@extends('admin.layout.index')


@section('content')

    <ul class="breadcrumb">
        <li><a href="#">{{__('Home')}}</a></li>
        <li class="active">{{__('Permission')}}</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Add Role
            </legend>
            <form action="{{route('permission.store')}}" class="form-horizontal" method="post">
                @csrf

                <div class="form-group">
                    <label class="col-lg-2 control-label">{{__('Permission')}}</label>

                    <div class="col-lg-6">
                        <input class="form-control" placeholder="{{__('Permission')}}" type="text" name="title">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">{{__('Slug')}}</label>

                    <div class="col-lg-6">
                        <input class="form-control" placeholder="Slug" type="text" name="slug">
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
