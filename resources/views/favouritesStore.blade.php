<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Favourites') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">                
                    @foreach ($adverts as $advert)
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="float-right">
                                <a 
                                    class="boarder-b-2 pb-2 border-dotted italic text-gray-500"
                                    href="favourites/{{$advert->id}}/show">
                                    Show more &rarr;
                                </a>
                                <form action=""class="pt-1" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button
                                        type="submit"
                                        class="boarder-b-2 pb-2 border-dotted italic text-red-500">
                                        Remove from favourites &rarr;
                                    </button>
                                </form>
                            </div>                                
                            <p class= ml-12>
                            <span class= ml-2>Title: {{$advert->title }}</span>
                            <span class= ml-2>Condition: {{$advert->condition }}</span>
                            <span class= ml-2>Price: {{$advert->price }}</span>
                            <span class= ml-2>Location: {{$advert->location }}</span>                                                                         
                            </p>                        
                        </div>
                    @endforeach    
            </div> 
        </div>
    </div>
</x-app-layout>
