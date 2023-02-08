<x-layout>
    <div class="w-full h-screen flex justify-center items-center flex-col">
        <div class="w-2/4 text-center rounded bg-[#eee] shadow-lg p-10">
            <h1 class="uppercase text-center font-bold text-2xl mb-4">login</h1>
            <form action="">
                <div class="mb-6">
                    <label for="Email" class="float-left mb-2 font-semibold">Email</label>
                    <input type="Email" id="Email" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-800 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="exemple@gmail.com" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="float-left mb-2 font-semibold">Password</label>
                    <input type="password" id="password" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-800 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="••••••••" required>
                </div>
                <x-btn>Login</x-btn>
                <p>Don't have an account? <a href="/register" class="font-bold">register</a></p>
            </form>            
        </div>
    </div>
</x-layout>