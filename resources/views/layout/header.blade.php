<header>
    <ul>
        <li>
            <a href="/">
            <img src="{{url('/images/logo/logo-no-background.png')}}" height="80px" width="80px"/>
            </a>
        </li>
        <li>
            <a href="#a">
                <i class="fa-solid fa-truck-fast"></i>
                Orders
            </a>
        </li>
        <li class="search" onmouseover="">
            <i class="fa-solid fa-magnifying-glass"></i>
            <div class="search-title">Search</div>
            <input type="text" class="searchbar" placeholder="Search" onfocus="focusSearch()">
        </li>
        <li class="right-menu">
            @auth
            <p class="welcome">Welcome, {{Auth::user()->name}}</p>
            <a class="logout" href="/logout">
            Logout
            </a>
            @if(Auth::user()->orders()->count()>0)
            <a href="/checkout">
                <i class="fa-solid fa-cart-shopping"></i>
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