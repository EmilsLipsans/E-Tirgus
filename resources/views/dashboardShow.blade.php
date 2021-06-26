<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('See more view') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a 
                    class="m-2 boarder-b-2 pb-2 border-dotted bold text-blue-500"
                    href="/dashboard">
                    Back to Dashboard
                    
                </a>
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($adverts as $advert)                  
                    
                    <h1 class= "ml-2 bold">Title: {{$advert->title }}</h1>    
                    <h1 class= ml-2>Condition: {{$advert->condition }}</h1>
                    <h1 class= ml-2>Price: {{$advert->price }}</h1>
                    <h1 class= ml-2>Location: {{$advert->location }}</h1>
                    @foreach($categories as $categorie )
                        @if($advert->categorie_id == $categorie->id)
                            <h1 class= ml-2>Kategorija: {{$categorie->name }}</h1>
                        @endif
                    @endforeach
                    <h1 class= ml-2>Text: {{$advert->text }}</h1>
                    <br>                    
                    <span class= ml-2>Created at: {{$advert->created_at }}</span>
                    <span class= ml-2>Updated at: {{$advert->updated_at }}</span>
                    <span class= ml-2>Posted by:                         
                        <a class="m-2 boarder-b-2 pb-2 border-dotted bold text-blue-500"
                            href="/dashboard">
                            @foreach($users as $user )
                                @if($advert->users_id == $user->id)
                            {{$user->name }}</a>
                                @endif
                            @endforeach                        
                    </span>                    
                    @endforeach      
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
