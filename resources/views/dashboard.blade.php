<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
     
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
                <div class="form-group m-2">
                    <label for="price">{{ __('messages.Price') }}</label>
                    <select name="price" id="price" class="form-control input-lg dynamic" data-dependet="state">
                        <option value="">Any</option>
                    </select>  
                    <label for="location">{{ __('messages.Location') }}</label>
                    <select name="location" id="location" class="form-control input-lg dynamic" data-dependet="state">
                        <option value="">Any</option>
                    </select>

                    <label for="condition">{{ __('messages.Condition') }}</label>
                    <select name="condition" id="condition" class="form-control input-lg dynamic" data-dependet="state">
                        <option value="">Any</option>
                    </select>
                    
                    <label for="category">{{ __('messages.Category') }}</label>
                    <select name="category" id="category" class="form-control input-lg dynamic" data-dependet="state">
                        <option value="">Any</option>
                    </select>
                    <x-button class="ml-3" type="submit">{{ __('messages.Search') }}</x-button>                 
                </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    @foreach ($adverts as $advert)                    
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="float-right">
                                <a 
                                    class="ml-3 italic text-gray-500"
                                    href="dashboard/{{$advert->id}}/show">
                                    {{ __('messages.Show more') }} &rarr;
                                </a>                                
                                @php
                                    $isfav = false;
                                    foreach ($favourites as $favourite){                                     
                                        if($advert->id == $favourite->adverts_id){
                                            $isfav = true;
                                            break;                                        
                                        }                                    
                                    }        
                                @endphp
                                @if(Auth::user())
                                    @if($isfav)
                                        <form method="POST" action="/dashboard/{{$advert->id}}"> 
                                            @csrf
                                            @method('delete')
                                            <button class="ml-3 italic text-red-500" type="submit">{{ __('messages.Remove from favourites') }}</button>                                           
                                        </form>                                    
                                    @else
                                        <form method="POST" action="/favourites/store">
                                            @csrf
                                            <input type="hidden" id="advertId" name="advertId" value="{{$advert->id}}">
                                            <button class="ml-3 italic text-yellow-500" type="submit">{{ __('messages.Add to favourites') }}</button>
                                        </form>
                                    @endif    
                                @endif 
                            </div>
                            <p class= ml-12>
                                <span class= ml-2>{{ __('messages.Title') }}: {{$advert->title }}</span>
                                <span class= ml-2>{{ __('messages.Condition') }}: {{$advert->condition }}</span>
                                <span class= ml-2>{{ __('messages.Price') }}: {{$advert->price }}</span> 
                                <span class= ml-2>{{ __('messages.Location') }}: {{$advert->location }}</span>
                            </p>
                            @can('is-admin')
                                <div>
                                    <span>
                                        <form action="delete/{{$advert->id}}"class="pt-1" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button
                                                type="submit"
                                                class="ml-3 italic text-red-500">
                                                {{ __('messages.Delete advert') }} &#10060;
                                            </button>
                                        </form>
                                    </span>    
                                </div>
                            @endcan                           
                        </div>
                    @endforeach
            {{$adverts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
