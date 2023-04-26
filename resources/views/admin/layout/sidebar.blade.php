<div class="list-group sidebar">

    <a href="{{route('sales.create')}}" class="list-group-item {{Request::is('sales/create')?'active':''}}">
        <i class="fa fa-shopping-bag"></i> New Sell</a>
    <a href="{{route('purchase.create')}}" class="list-group-item {{Request::is('purchase/create')?'active':''}}">
        <i class="fa fa-shopping-basket"></i> New Purchase</a>
    <a href="{{route('payment.index')}}" class="list-group-item {{Request::is('payment')?'active':''}}">
        <i class="fa fa-money"></i> Invoice Payment</a>
    <hr>

    <a href="{{route('sales.index')}}" class="list-group-item {{Request::is('seles')?'active':''}}">
        <i class="fa fa-list-alt"></i> Sales List</a>
    <a href="{{route('purchase.index')}}" class="list-group-item {{Request::is('purchase')?'active':''}}">
        <i class="fa fa-list-ul"></i> Purchase List</a>
    <hr>
    <a href="{{route('food.index')}}" class="list-group-item {{Request::is('food')?'active':''}}">
        <i class="fa fa-coffee"></i> Food</a>
    <a href="{{route('food-category.index')}}" class="list-group-item {{Request::is('food-category')?'active':''}}">
        <i class="fa fa-tasks"></i> Food Category</a>
    <a href="{{route('table.index')}}" class="list-group-item {{Request::is('table')?'active':''}}">
        <i class="fa fa-cutlery"></i> Table</a>
    {{-- <a href="bill" class="list-group-item {{Request::is('bill')?'active':''}}">
        <i class="fa fa-file-text"></i> Bill</a> --}}
    <hr>
    <a href="{{route('brand.index')}}" class="list-group-item {{Request::segment(1)=='brand'?'active':''}}">
        <i class="fa fa-contao"></i> Brand</a>
    <a href="category" class="list-group-item {{Request::segment(1)=='category'?'active':''}}">
        <i class="fa fa-clone"></i> Category</a>
    <a href="{{route('product.index')}}" class="list-group-item {{Request::segment(1)=='product'?'active':''}}">
        <i class="fa fa-cube"></i> Product</a>
    <a href="{{route('discount.index')}}" class="list-group-item {{Request::segment(1)=='discount'?'active':''}}">
        <i class="fa fa-crop"></i> Discount</a>
    <hr>
    <a href="report" class="list-group-item {{Request::segment(1)=='report'?'active':''}}">
        <i class="fa fa-bar-chart"></i> Report</a>

    <hr>
    <a href="{{route('stock.index')}}" class="list-group-item {{Request::segment(1)=='stock'?'active':''}}">
        <i class="fa fa-cubes"></i> Stock</a>
    <a href="{{route('refund.index')}}" class="list-group-item {{Request::segment(1)=='refund'?'active':''}}">
        <i class="fa fa-share-square-o"></i> Refund/Return</a>
    <hr>
    <a href="{{route('employee.index')}}" class="list-group-item {{Request::segment(1)=='employee'?'active':''}}">
        <i class="fa fa-user-secret"></i> Employee</a>
    <hr>
    <a href="{{route('customers.index')}}" class="list-group-item {{Request::segment(1)=='customers'?'active':''}}">
        <i class="fa fa-user"></i> Customers</a>
    <a href="{{route('user.index')}}" class="list-group-item {{Request::segment(1)=='user'?'active':''}}">
        <i class="fa fa-users"></i> Users</a>
    <a href="{{route('role.index')}}" class="list-group-item {{Request::segment(1)=='role'?'active':''}}">
        <i class="fa fa-user"></i> Roles</a>
    <a href="{{route('permission.index')}}" class="list-group-item {{Request::segment(1)=='permission'?'active':''}}">
        <i class="fa fa-cog"></i> Permission</a>
    <a href="{{route('slider.index')}}" class="list-group-item {{Request::segment(1)=='slider'?'active':''}}">
        <i class="fa fa-cog"></i> Slider</a>
    <a href="{{route('settings.index')}}" class="list-group-item {{Request::segment(1)=='settings'?'active':''}}">
        <i class="fa fa-cogs"></i> Settings</a>
</div>
