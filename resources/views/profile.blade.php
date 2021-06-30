<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">           
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               @foreach ($users as $user)
                    @php
                    if($user->role==0){
                        $role='User';
                    }
                    else{
                        $role='Admin';
                    }                   
                    @endphp
                    <div class="p-6 bg-white border-b border-gray-200">                                                                               
                            <h1 class= ml-2>{{ __('messages.Name') }}: {{$user->name }}</a></h1>
                            <h1 class= ml-2>{{ __('messages.Email') }}: {{$user->email }}</h1>
                            <h1 class= ml-2>{{ __('messages.Created at') }}: {{$user->created_at }}</h1>                                                                                                 
                            <h1 class= ml-2>{{ __('messages.Role') }}: {{ __('messages.' . $role) }}</h1>                                                 
                    </div> 
                @endforeach 
            </div>  
        </div>
    </div>
</x-app-layout>