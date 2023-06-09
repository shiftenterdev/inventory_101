<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand sH" href="javascript:"><i class="fa fa-bars"></i></a>
            <a class="navbar-brand" href="{{route('admin.dashboard')}}">Raindrop</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i>{{__('Home')}}</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="search" class="form-control" placeholder="{{__('Search')}}">
                    </div>
                    <button type="submit" class="btn btn-info"><i class="fa fa-search"></i>{{__('Search')}}</button>
                </form>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-flag"></i> {{'Language'}}({{Str::upper(session()->get('locale')??'EN')}})
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{route('language','en')}}">English</a></li>
                        <li><a href="{{route('language','nl')}}">Dutch</a></li>
                        <li><a href="{{route('language','de')}}">German</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-user-md"></i> {{auth()->user()->name}}
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{route('user.index')}}">{{__('Users')}}</a></li>
                        <li><a href="{{route('product.index')}}">{{__('Products')}}</a></li>
                        <li class="divider"></li>
                        <li><a href="{{route('settings.index')}}">{{__('Update Password')}}</a></li>
                        <li class="divider"></li>
                        <li><a href="{{route('logout')}}">{{__('Logout')}}</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
