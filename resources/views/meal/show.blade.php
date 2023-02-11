<x-layout>
    <section class="bg-white">
        <button onclick="window.history.back()" type="button" class="cursor-pointer m-5 text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            <i class="fa fa-arrow-left mr-2" aria-hidden="true"></i> Back
        </button> 
        <div class="py-8 px-4 mx-auto max-w-2xl">
            <h2 class="mb-2 text-xl font-semibold leading-none text-gray-900 md:text-2xl">{{$meal->name}}</h2>
            <div style="background-size:cover; background-position: center; background-repeat:no-repeat; background-image:url('{{$meal->image ? asset('storage/' . $meal->image) : asset('images/default.jpeg')}}'); width:100%; height:250px;" ></div>
            <p class="mb-4 text-xl font-extrabold leading-none text-gray-900 md:text-2xl">{{$meal->price}} DH</p>
            <dl>
                <dt class="mb-2 font-semibold leading-none text-gray-900">Description</dt>
                <dd class="mb-4 font-light text-gray-500 sm:mb-5">{{$meal->description}}</dd>
            </dl>
        </div>
    </section>
</x-layout> 