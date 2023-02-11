@props(['meal'])

<tr class="border-b">
    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">{{$meal->name}}</th>
    <td class="px-4 py-3">{{$meal->name}}</td>
    <td class="px-4 py-3">{{$meal->price}}DH</td>
    <td class="px-4 py-3 flex items-center justify-end">
        <button id="dropdown-button-{{$meal->id}}" data-dropdown-toggle="dropdown-{{$meal->id}}" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none" type="button">
            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
            </svg>
        </button>
        <div id="dropdown-{{$meal->id}}" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow">
            <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdown-button-{{$meal->id}}">
                <li>
                    <a href="/meal/{{$meal->id}}" class="block py-2 px-4 hover:bg-gray-100">Show</a>
                </li>
                <li>
                    <a href="/edit/{{$meal->id}}" class="block py-2 px-4 hover:bg-gray-100">Edit</a>
                </li>
            </ul>
            <form method="POST" action="/delete/{{$meal->id}}" class="py-1">
                @csrf
                @method('DELETE')
                <button type="submit" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">Delete</button>
            </form>
        </div>
    </td>
</tr>