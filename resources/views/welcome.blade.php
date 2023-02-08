<x-layout>
    <div class="min-h-screen" style="background-image: url('https://images.unsplash.com/photo-1467739792465-ac5d3aca7614?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80');">
        <div class="min-h-screen bg-black bg-opacity-30 flex items-center justify-center flex-col">
            <h1 class="text-lg text-isabelline font-bold">Bistro Of Morocco</h1>
            <p class="text-isabelline">Where we believe in the power of good food and great company</p>
            <div class="mt-2">
                <x-btn><a href="/login">Login</a></x-btn>
                <x-btn><a href="/register">Register</a></x-btn>
                <div class="flex flex-col">
                    <x-btn><a href="/menu">continue as a guest</a></x-btn>
                </div>
            </div>
        </div>
    </div>
</x-layout>