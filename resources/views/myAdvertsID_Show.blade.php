<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.Show more view') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a 
                    class="m-2 boarder-b-2 pb-2 border-dotted bold text-blue-500"
                    href="/myAdverts/show">
                    {{ __('messages.Back to Show MyAdverts') }}
                    
                </a>
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($adverts as $advert)
                    <div>
                        <center><img
                            src= "{{asset('images/' . $advert->image_path)}}"
                            alt=""
                            class="w-180 mb-8 shadow-xl"
                        >                        
                    </img></center>
                    </div>
                    <h1 class= "ml-2 bold">{{ __('messages.Title') }}: {{$advert->title }}</h1>    
                    <h1 class= ml-2>{{ __('messages.Condition') }}: {{ __('messages.' . $advert->condition) }}</h1>
                    <h1 class= ml-2>{{ __('messages.Price') }}: {{$advert->price }}</h1>
                    <h1 class= ml-2>{{ __('messages.Location') }}: {{$advert->location }}</h1>
                    @foreach($categories as $categorie )
                        @if($advert->categorie_id == $categorie->id)
                            <h1 class= ml-2>{{ __('messages.Category') }}: {{ __('messages.' . $categorie->name) }}</h1>
                        @endif
                    @endforeach
                    <h1 class= ml-2>{{ __('messages.Description') }}: {{$advert->text }}</h1>
                    <br>                    
                    <span class= ml-2>{{ __('messages.Created at') }}: {{$advert->created_at }}</span>
                    <span class= ml-2>{{ __('messages.Updated at') }}: {{$advert->updated_at }}</span>
                    <span class= ml-2>{{ __('messages.Posted by') }}: {{ __('messages.Me') }}</span>                    
                    @endforeach      
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
