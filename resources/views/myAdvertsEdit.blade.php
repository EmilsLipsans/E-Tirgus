<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.Update Advert')}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a 
                    class="m-2 boarder-b-2 pb-2 border-dotted bold text-blue-500"
                    href="/myAdverts/show">
                    {{ __('messages.Back to Show MyAdverts')}}
                </a>
                <div align="center" class="p-6 bg-white border-b border-gray-200 right-10"> 
                    @if($errors->any())
                        <div class="w-4/8 m-auto text-center">
                            @foreach($errors->all() as $error)
                                <li class="text-red-500 list-none">
                                    {{ __('messages.' . $error)}}
                                </li>
                            @endforeach    
                        </div>
                    @endif
                    <form method="POST" action="/myAdverts/show/{{$advert->id}}">
                        @csrf
                        @method('Put')                     
                        <div class="grid grid-cols-1 gap-2">
                            <div class="grid grid-rows-3 gap-6">
                                <label for="title">{{ __('messages.Title')}}</label>
                                <x-input id="title" class="block  w-full" type="text" name="title" value="{{$advert->title}}"/> 
                                <label for="condition">{{ __('messages.Condition')}}</label>
                                <select id="condition" name="condition">
                                    <option value="{{$advert->condition}}">{{ __('messages.Current')}} - {{ __('messages.' . $advert->condition )}} </option>
                                    @if($advert->condition != 'NEW')
                                    <option value="NEW">{{ __('messages.NEW')}}</option>
                                    @endif
                                    @if($advert->condition != 'USED')
                                    <option value="USED">{{ __('messages.USED')}}</option>
                                    @endif
                                    @if($advert->condition != 'BROKEN')
                                    <option value="BROKEN">{{ __('messages.BROKEN')}}</option>
                                    @endif
                                </select> 
                                <label for="price">{{ __('messages.Price')}}</label>
                                <input class="block  w-full" type="number" name="price" value="{{$advert->price}}"/>
                                <label for="location">{{ __('messages.Location')}}</label>
                                <select id="location" name="location">
                                    <option value="{{$advert->location}}">{{ __('messages.Current')}} - {{$advert->location}}</option>
                                    @if($advert->location != 'Riga')
                                    <option value="Riga">Riga</option>
                                    @endif
                                    @if($advert->location != 'Daugavpils')
                                    <option value="Daugavpils">Daugavpils</option>
                                    @endif
                                    @if($advert->location != 'Liepaja')
                                    <option value="Liepaja">Liepaja</option>
                                    @endif
                                </select>
                                <label for="catagorie">{{ __('messages.Category')}}</label>
                                <select id="catagorie" name="catagorie">
                                @foreach($categories as $categorie )
                                    @if($advert->categorie_id == $categorie->id)
                                        <option value="{{$advert->categorie_id}}">{{ __('messages.Current')}} - {{ __('messages.' . $categorie->name)}}</option>
                                    @endif
                                @endforeach
                                
                                @foreach($categories as $categorie )
                                    @if($advert->categorie_id != $categorie->id)
                                        <option value="{{$advert->categorie_id}}">{{ __('messages.' . $categorie->name)}}</option>
                                    @endif
                                @endforeach                                                                          
                                </select> 
                                <label for="text">{{ __('messages.Description')}}</label>
                                <textarea name="text" id="text" >
                                    {{$advert->text}}
                                </textarea>
                                <label for="image">{{ __('messages.Upload image')}}</label>
                                <input class="block shadow-5xl mb-10 p-2 w-80 itacli placeholder-gray-400" type="file" name="image"/>

                                <x-button class="ml-3" type="submit">{{ __('messages.Update')}}</x-button>
                    </form>
                        </div> 
                    </div>         
                </div>             
            </div>
        </div>        
    </div>
</x-app-layout>
