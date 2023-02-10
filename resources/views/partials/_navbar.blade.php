<nav class="flex justify-between p-5">
    <h2>Bistro Of Morocco</h2>
    <div class="flex">
        @auth
            <p class="mr-2">{{auth()->user()->username}}</p>
            <a href="/logout"><i class="fa-solid fa-door-closed"></i> Logout</a>
        @else
            <x-btn><a href="/login">Login</a></x-btn>
            <x-btn><a href="/register">Register</a></x-btn>
        @endauth
    </div>
</nav>