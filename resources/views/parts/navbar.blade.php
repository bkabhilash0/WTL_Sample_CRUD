<header>
    <nav>
        <ul class="flex gap-5 items-center justify-end text-white bg-indigo-500 py-3 px-2">
            <li><a href="{{ route('books.index') }}">Home</a></li>
            <li><a href="{{ route('books.add') }}">Add Book</a></li>
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
            @endguest
            @auth
                <li><a href="{{ route('logout') }}">Logout</a></li>
            @endauth
        </ul>
    </nav>
</header>
