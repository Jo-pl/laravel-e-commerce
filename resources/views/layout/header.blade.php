
<header>
    <ul>
        <li>
            <a href="/">
            <img src="{{url('/images/logo/logo-no-background.png')}}" height="80px" width="80px"/>
            </a>
        </li>
        <li>
            <a href="/orders">
                <i class="fa-solid fa-truck-fast"></i>
                Orders
            </a>
        </li>
        <li class="search">
            <a href="/products">
                <i class="fa-solid fa-magnifying-glass"></i>
                Products
            </a>
        </li>
        <li class="right-menu">
            @auth
            <p class="welcome">Welcome, {{Auth::user()->name}}</p>
            <a class="logout" href="/logout">
            Logout
            </a>
            @if(Auth::user()->orders()->where('status',1)->count()>0)
            <a href="/checkout">
                <span class="fa-stack fa-1x">
                    <i class="fa solid fa-cart-shopping fa-stack-1x"></i>
                    <i class="fa-stack-1x fa-inverse" style="font-size:0.5em; color:black;vertical-align: super;">
                        {{Auth::user()->getQuantity()}}
                    </i>
                  </span>
            </a>
            @endif
            @endauth
            @guest
            <a href="/login">
            <i class="fa-solid fa-right-to-bracket"></i>
            Login
            </a>
            @endguest
        </li>
    </ul>
</header>