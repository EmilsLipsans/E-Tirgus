<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.MyAdverts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="/myAdverts/show" method="get">
                        <h1 class="text-center px-8 m-4">                       
                            <x-button class="badge-dark" type="submit">{{ __('messages.Show My Adverts') }}</x-button>
                        </h1>
                    </form>
                    <form action="/myAdverts/show/create" method="get">
                        <h1 class="text-center px-8">                       
                            <x-button class="badge-dark" type="submit">{{ __('messages.Create New Adverts') }}</x-button>
                        </h1>
                    </form>
                        
                </div>             
            </div>
        </div>        
    </div>
</x-app-layout>
