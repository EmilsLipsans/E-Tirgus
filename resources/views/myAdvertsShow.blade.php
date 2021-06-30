<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.Show MyAdverts') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a 
                        class="boarder-b-2 pb-2 border-dotted bold text-blue-500"
                        href="/myAdverts">
                        {{ __('messages.Back to MyAdverts') }}
                    </a>
                    <h1 class="text-center px-8">{{ __('messages.My Adverts') }}</h1>
                </div>
                @foreach ($adverts as $advert)                    
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="float-right">
                                
                                <a 
                                    class="boarder-b-2 pb-2 border-dotted italic text-green-500"
                                    href="show/{{$advert->id}}/edit">
                                    {{ __('messages.Edit') }} &rarr;
                                </a>
                                <form action="show/{{$advert->id}}"class="pt-1" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button
                                        type="submit"
                                        class="boarder-b-2 pb-2 border-dotted italic text-red-500">
                                        {{ __('messages.Delete') }} &rarr;
                                    </button>
                                </form>
                            </div>
                            <p class= ml-12>
                            <span class= ml-2>{{ __('messages.Title') }}: {{$advert->title }}</span>
                            <span class= ml-2>{{ __('messages.Condition') }}: {{$advert->condition }}</span>
                            <span class= ml-2>{{ __('messages.Price') }}: {{$advert->price }}</span>
                            <span class= ml-2>{{ __('messages.Location') }}: {{$advert->location }}</span>
                            <span>
                                <a 
                                    class="ml-3 italic text-gray-500"
                                    href="{{$advert->id}}/show">
                                    {{ __('messages.Show more') }} &rarr;
                                </a>
                            </span>
                            </p>                        
                        </div>                   
                @endforeach
            </div>
            {{$adverts->links() }}
        </div>
        
    </div>
</x-app-layout>
