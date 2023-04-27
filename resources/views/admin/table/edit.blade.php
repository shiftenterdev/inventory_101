@extends('admin.layout.index')


@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Table</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Update Table
            </legend>
            <form action="{{route('table.update',$table->id)}}" class="form-horizontal" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="col-lg-2 control-label">To Seat</label>

                    <div class="col-lg-8">
                        <input class="form-control" placeholder="To Seat" value="{{$table->to_seat}}" type="text" name="to_seat">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-2 control-label">Status</label>

                    <div class="col-lg-8">
                        <div class="radio">
                            <input name="status" id="radio1" value="1" checked="" type="radio">
                            <label for="radio1">
                                <mark></mark>
                                Free
                            </label>
                        </div>
                        <div class="radio">
                            <input name="status" id="radio2" value="2" type="radio">
                            <label for="radio2">
                                <mark></mark>
                                Closed
                            </label>
                        </div>
                    </div>
                </div>



                <hr>
                <div class="form-group">
                    <div class="col-lg-8 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">Update Table</button>
                    </div>
                </div>
            </form>
        </fieldset>

    </div>
@endsection
