<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="form-group m-2">
                        
                <select name="price" id="price" class="form-control input-lg dynamic" data-dependet="state">
                    <option value="">Cena</option>
                </select>    

                <select name="location" id="location" class="form-control input-lg dynamic" data-dependet="state">
                    <option value="">Atrašanās vieta</option>
                </select>

                <select name="condition" id="condition" class="form-control input-lg dynamic" data-dependet="state">
                    <option value="">Stāvoklis</option>
                </select>

                <select name="category" id="category" class="form-control input-lg dynamic" data-dependet="state">
                    <option value="">Kategorija</option>
                </select>
                
                        
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
