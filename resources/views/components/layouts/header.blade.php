<header class="d-flex justify-content-center py-3">
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="/" class="nav-link @if(request()->path() === '/') active @endif">Home</a></li>
        <li class="nav-item"><a href="{{ route('posts.index') }}"
                                class="nav-link @if(request()->routeIs('posts.index')) active @endif">Blog</a></li>
        @auth()
        <li class="nav-item">
            <a href="{{ route('posts.create') }}"
               class="nav-link @if(request()->routeIs('posts.create')) active @endif">Create Post</a>
        </li>
        @endauth
        @guest
            <li class="nav-item">
                <a href="{{ route('login') }}"
                   class="nav-link @if(request()->routeIs('login')) active @endif">Login</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('register') }}"
                   class="nav-link @if(request()->routeIs('register')) active @endif">Registration</a>
            </li>
        @endguest
        @auth()
            <li class="nav-item">
                <a class="nav-link disabled"> <small> User: </small> <strong> {{ auth()->user()->name }}</strong></a>
            </li>


            <li class="nav-item">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="nav-link @if(request()->routeIs('logout')) active @endif">Logout</button>
                </form>
            </li>

        @endauth
    </ul>
</header>
