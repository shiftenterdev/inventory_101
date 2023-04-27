@extends('admin.layout.index')


@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Brand</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Brand List
                <a href="{{route('brand.create')}}" class="btn btn-sm btn-primary nB pull-right openRight">
                    <i class="fa fa-plus"></i> New Brand</a>
            </legend>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>SL</th>
                    {{--<th>Image</th>--}}
                    <th>Title</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($brands as $k => $b)
                    <tr>
                        <td>{{$k+1}}</td>
                        {{--<td>--}}
                            {{--<img src="{{$b->image}}" alt="{{$b->title}}" class="t-img">--}}
                        {{--</td>--}}
                        <td>{{$b->title}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{route('brand.edit',$b->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                <a href="{{route('brand.destroy',$b->id)}}" class="btn btn-sm btn-danger confirm"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </fieldset>

    </div>
@endsection

