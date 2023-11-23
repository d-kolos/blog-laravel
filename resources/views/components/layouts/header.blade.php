<header class="d-flex justify-content-center py-3">
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="/" class="nav-link @if(request()->path() === '/') active @endif">Home</a></li>
        <li class="nav-item"><a href="/posts" class="nav-link @if(request()->path() === 'posts') active @endif">Blog</a></li>
        <li class="nav-item">
            <a href="/posts/create"
               class="nav-link @if(request()->path() === 'posts/create') active @endif">Create Post</a>
        </li>
    </ul>
</header>
