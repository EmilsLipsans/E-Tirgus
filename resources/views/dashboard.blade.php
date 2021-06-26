<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">          
                <div class="form-group m-2">
                    <label for="price">Price</label>
                    <select name="price" id="price" class="form-control input-lg dynamic" data-dependet="state">
                        <option value="">Any</option>
                    </select>  
                    <label for="location">Location</label>
                    <select name="location" id="location" class="form-control input-lg dynamic" data-dependet="state">
                        <option value="">Any</option>
                    </select>

                    <label for="condition">Condition</label>
                    <select name="condition" id="condition" class="form-control input-lg dynamic" data-dependet="state">
                        <option value="">Any</option>
                    </select>
                    
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control input-lg dynamic" data-dependet="state">
                        <option value="">Any</option>
                    </select>
                    <x-button class="ml-3" type="submit">Search</x-button>                 
                </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    @foreach ($adverts as $advert)                    
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="float-right">
                                <a 
                                    class="boarder-b-1 pb-1 border-dotted italic text-gray-500"
                                    href="dashboard/{{$advert->id}}/show">
                                    See more &rarr;
                                </a>
                                <a 
                                    class="boarder-b-1 pb-1 border-dotted italic text-yellow-500"
                                    href="favourite/{{$advert->id}}/create">
                                    Add to favourites &rarr;
                                </a>
                                <br>
<!--                                <form action="show/{{$advert->id}}"class="pt-1" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button
                                        type="submit"
                                        class="boarder-b-2 pb-2 border-dotted italic text-red-500">
                                        Delete &rarr;
                                    </button>
                                </form>-->
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
            {{$adverts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
