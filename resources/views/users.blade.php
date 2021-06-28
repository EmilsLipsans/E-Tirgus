<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               @foreach ($users as $user)                                                                                  
                    <div class="p-6 bg-white border-b border-gray-200">                       
                        <div class="float-right">  
                            @if($user->status===0)
                                <form method="POST" action="/users/{{$user->id}}">
                                    @csrf
                                    <input type="hidden" id="status" name="status" value="1">
                                    <button class="ml-3 italic text-blue-500" type="submit">Unban user </button>
                                </form>
                                
                            @else
                                <form method="POST" action="/users/{{$user->id}}">
                                    @csrf
                                    <input type="hidden" id="status" name="status" value="0">
                                    <button class="ml-3 italic text-red-500" type="submit">Ban user </button>
                                </form>                           
                            @endif
                        </div>                                
                        <p class= ml-12>
                            <span class= ml-2>Name:<a class="m-2 boarder-b-2 pb-2 border-dotted bold text-blue-500" href="/dashboard"> {{$user->name }}</a></span>
                            <span class= ml-2>Email: {{$user->email }}</span>
                            <span class= ml-2>Created at: {{$user->created_at }}</span>                                                                                                 
                        </p>                        
                    </div>                            
                @endforeach 
            </div>                        
        </div>
    </div>
</x-app-layout>
