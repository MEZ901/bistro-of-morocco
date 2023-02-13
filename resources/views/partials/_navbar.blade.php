<nav class="flex justify-between p-5">
    <h2 class="font-bold text-xl cursor-pointer">Bistro Of Morocco</h2>
    <div class="flex">
        @auth
            <div>
                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto">{{auth()->user()->username}} <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                      <li>
                        <a href="/dashboard" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a>
                      </li>
                      <li>
                        <a href="/settings" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
                      </li>
                    </ul>
                    <div class="py-1">
                      <a href="/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a>
                    </div>
                </div>
            </div>
        @else
            <x-btn><a href="/login">Login</a></x-btn>
            <x-btn><a href="/register">Register</a></x-btn>
        @endauth
    </div>
</nav>