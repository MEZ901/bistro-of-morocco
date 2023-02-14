@props(['user'])
<tr class="border-b hover:bg-gray-100">
    <th scope="row" class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
        {{$user->username}}
    </th>
    <td class="px-4 py-2">
        {{$user->email}}
    </td>
    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
        <div class="flex items-center">
            @if ($user->is_admin)
                <div class="inline-block w-4 h-4 mr-2 bg-green-500 rounded-full"></div>
                On
            @else
                <div class="inline-block w-4 h-4 mr-2 bg-red-700 rounded-full"></div>
                Off   
            @endif
        </div>
    </td>
    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
        <form method="POST" action="/set-admin/{{$user->id}}">
            @method('PATCH')
            @csrf
            <button type="submit" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 focus:outline-none">
                @if ($user->is_admin)
                    Take Authorization
                @else
                    Give Authorization
                @endif
            </button>
            
        </form>
    </td>
</tr>