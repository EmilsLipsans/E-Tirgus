<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Favourites') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               @foreach ($users as $user)                   
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="float-right">                            
                            <form method="POST" action="/favourites/store">
                                @csrf
                                <input type="hidden" id="advertId" name="advertId" value="">
                                <button class="ml-3 italic text-red-500" type="submit">Ban user </button>
                            </form>
                        </div>                                
                        <p class= ml-12>
                        <span class= ml-2>Title: {{$user->name }}</span>
                        <span class= ml-2>Condition: {{$user->condition }}</span>
                        <span class= ml-2>Price: {{$user->created_at }}</span>
                        <span class= ml-2>Location: {{$user->location }}</span>                                                                         
                        </p>                        
                    </div>                            
                @endforeach 
            </div>                        
        </div>
    </div>
</x-app-layout>
