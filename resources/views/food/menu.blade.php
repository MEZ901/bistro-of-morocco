<p>{{auth()->user()->username}}</p>
<form class="inline" method="POST" action="/logout">
    @csrf
    <button type="submit">
        <i class="fa-solid fa-door-closed"></i> Logout
    </button>
</form>