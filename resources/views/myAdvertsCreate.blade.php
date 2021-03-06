<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.Create New Adverts') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a 
                    class="m-2 boarder-b-2 pb-2 border-dotted bold text-blue-500"
                    href="/myAdverts">
                    {{ __('messages.Back to MyAdverts')}}
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
                    <form method="POST" action="/myAdverts/show" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 gap-2">
                             
                            <div class="grid grid-rows-3 gap-6">                                
                                <label for="title">{{ __('messages.Title')}}</label>
                                <x-input id="title" class="block  w-full" type="text" name="title"/> 
                                
                                <label for="condition">{{ __('messages.Condition')}}</label>
                                <select id="condition" name="condition">
                                    <option value="NEW">{{ __('messages.NEW')}}</option>
                                    <option value="USED">{{ __('messages.USED')}}</option>
                                    <option value="BROKEN">{{ __('messages.BROKEN')}}</option>
                                </select> 
                                <label for="price">{{ __('messages.Price')}}</label>
                                <input class="block  w-full" type="number" name="price" placeholder="250"/>
                                <label for="location">{{ __('messages.Location')}}</label>
                                <select id="location" name="location">
                                    <option value="Riga">Riga</option>
                                    <option value="Daugavpils">Daugavpils</option>
                                    <option value="Liepaja">Liepaja</option>
                                </select>
                                <label for="catagorie">{{ __('messages.Category')}}</label>
                                <select id="catagorie" name="catagorie">
                                    @foreach($categories as $categorie )
                                    <option value="{{$categorie->id }}">{{ __('messages.' . $categorie->name)}}</option>
                                    @endforeach                                    
                                </select> 
                                <label for="text">{{ __('messages.Description')}}</label>
                                <textarea name="text" id="text">
                                </textarea>
                                <label for="image">{{ __('messages.Upload image')}}</label>
                                <input class="block shadow-5xl mb-10 p-2 w-80 itacli placeholder-gray-400" type="file" name="image"/> 
                                <x-button type="submit">{{ __('messages.Create')}}</x-button>
                            </div> 
                        </div>
                    </form>
                </div>             
            </div>
        </div>        
    </div>
</x-app-layout>
