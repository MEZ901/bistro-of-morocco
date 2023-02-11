<x-layout>
    @include('partials._navbar')
    <div class="flex flex-wrap justify-center">
        @foreach ($meals as $meal)
            <x-card :meal="$meal"/> 
        @endforeach
    </div>
    <div class="mt-6 p-4">
        {{$meals->links()}}
    </div>
</x-layout>