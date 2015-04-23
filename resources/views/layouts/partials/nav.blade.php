<header class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">OptiChamp</a>
        </div>
        <div id="navbar">

            <ul class="nav navbar-nav navbar-right">

                @if(Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li><a href="{{ url('account') }}">{{ Auth::user()->name }}</a></li>
                    <li class="pull-right"><a href="{{ route('logout') }}">Logout</a></li>
                @endif

            </ul>
        </div>
    </div>
</header>