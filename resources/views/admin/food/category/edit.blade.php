@extends('admin.layout.index')

@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Food</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Update Food Category
            </legend>
            <form action="{{route('food-category.update',$foodCategory->id)}}" class="form-horizontal" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="col-lg-2 control-label">Title</label>

                    <div class="col-lg-8">
                        <input class="form-control" placeholder="Title" type="text" name="title" value="{{$foodCategory->title}}">
                    </div>
                </div>


                <hr>
                <div class="form-group">
                    <div class="col-lg-8 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </fieldset>

    </div>
@endsection

