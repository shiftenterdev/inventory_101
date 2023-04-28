@extends('admin.layout.index')

@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Settings</li>
    </ul>
    <div class="cN">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">
                            {{__('Store Settings')}}
                        </h2>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('settings.store')}}" class="form-horizontal" method="post">
                            @csrf

                            <div class="form-group">
                                <label class="col-lg-3 control-label">{{__('Currency')}}</label>

                                <div class="col-lg-6">
                                    <input class="form-control" placeholder="Currency" type="text"
                                           name="currency" value="{{systemConfig('currency')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">{{__('Invoice Prefix')}}</label>

                                <div class="col-lg-6">
                                    <input class="form-control" placeholder="Invoice Prefix" type="text"
                                           name="invoice_prefix" value="{{systemConfig('invoice_prefix')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">{{__('Order Prefix')}}</label>

                                <div class="col-lg-6">
                                    <input class="form-control" placeholder="Order Prefix" type="text"
                                           name="order_prefix"
                                           value="{{systemConfig('order_prefix')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-3">
                                    <button type="submit" class="btn btn-primary">{{__('Update Store')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">
                            {{__('Update Password')}}
                        </h2>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('settings.update.password')}}" class="form-horizontal" method="post">
                            @csrf

                            <div class="form-group">
                                <label class="col-lg-3 control-label">{{__('Current Password')}}</label>

                                <div class="col-lg-6">
                                    <input class="form-control" placeholder="Current Password" type="password"
                                           name="current_password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">{{__('New Password')}}</label>

                                <div class="col-lg-6">
                                    <input class="form-control" placeholder="New Password" type="password"
                                           name="new_password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">{{__('Confirm Password')}}</label>

                                <div class="col-lg-6">
                                    <input class="form-control" placeholder="Confirm Password" type="password"
                                           name="confirm_password">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-6 col-lg-offset-3">
                                    <button type="submit" class="btn btn-primary" disabled>{{__('Update Password')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

