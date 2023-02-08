<x-layout>
    <div class="w-full h-screen flex justify-center items-center flex-col">
        <div class="w-2/4 text-center rounded bg-[#eee] shadow-lg p-10">
            <h1 class="uppercase text-center font-bold text-2xl mb-4">register</h1>
            <form action="">
                <div class="mb-6">
                    <label for="username" class="float-left mb-2 font-semibold">Username</label>
                    <input type="text" id="username" name="username" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-800 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="username" required>
                </div>
                <div class="mb-6">
                    <label for="Email" class="float-left mb-2 font-semibold">Email</label>
                    <input type="Email" id="Email" name="email" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-800 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="exemple@gmail.com" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="float-left mb-2 font-semibold">Password</label>
                    <input type="password" id="password" name="password" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-800 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="••••••••" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="float-left mb-2 font-semibold">Repeat password</label>
                    <input type="password" id="password" name="password_confirmation" class="border text-sm rounded-lg block w-full p-2.5 bg-gray-800 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="••••••••" required>
                </div>
                <x-btn>Register</x-btn>
                <p>Already have an account? <a href="/login" class="font-bold">Login</a></p>
            </form>            
        </div>
    </div>
</x-layout>