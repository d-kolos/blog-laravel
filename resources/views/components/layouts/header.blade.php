<header class="d-flex justify-content-center py-3">
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="/" class="nav-link @if(request()->path() === '/') active @endif">Home</a></li>
        <li class="nav-item"><a href="{{ route('posts.index') }}"
                                class="nav-link @if(request()->routeIs('posts.index')) active @endif">Blog</a></li>
        <li class="nav-item">
            <a href="{{ route('posts.create') }}"
               class="nav-link @if(request()->routeIs('posts.create')) active @endif">Create Post</a>
        </li>
    </ul>
</header>
