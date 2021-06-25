<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Advert')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div align="center" class="p-6 bg-white border-b border-gray-200 right-10">                   
                    <form method="POST" action="/myAdverts/show/{{$advert->id}}">
                        @csrf
                        @method('Put')                     
                        <div class="grid grid-cols-1 gap-2">
                            <div class="grid grid-rows-3 gap-6">
                                <label for="title">Title</label>
                                <x-input id="title" class="block  w-full" type="text" name="title" value="{{$advert->title}}"/> 
                                <label for="condition">Condition</label>
                                <select id="condition" name="condition">
                                    <option value="{{$advert->condition}}">Current - {{$advert->condition}}</option>
                                    <option value="NEW">NEW</option>
                                    <option value="USED">USED</option>
                                    <option value="BROKEN">BROKEN</option>
                                </select> 
                                <label for="price">Price</label>
                                <input class="block  w-full" type="number" name="price" value="{{$advert->price}}"/>
                                <label for="location">Location</label>
                                <select id="location" name="location">
                                    <option value="{{$advert->location}}">Current - {{$advert->location}}</option>
                                    <option value="Riga">Riga</option>
                                    <option value="Daugavpils">Daugavpils</option>
                                    <option value="Liepaja">Liepaja</option>
                                </select>
                                <label for="catagorie">Category</label>
                                <select id="catagorie" name="catagorie" value="{{$advert->catagorie}}">
                                    <option value="1">Transports</option>
                                    <option value="2">Elektronika</option>
                                    <option value="3">Apģērbs</option>
                                </select> 
                                <label for="text">Text</label>
                                <textarea name="text" id="text" >
                                    {{$advert->text}}
                                </textarea>

                                <button class="ml-3" type="submit">Submit</button>
                    </form>
                        </div> 
                    </div>         
                </div>             
            </div>
        </div>        
    </div>
</x-app-layout>
