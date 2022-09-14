<div class="">
    <x-guest-layout>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div>
                <a href="/">
                    @include('partials.logo-with-writing',['width'=>300,'height'=>200])
                </a>
            </div>
            <div class="w-full sm:max-w-md mt-6 shadow-md sm:rounded-lg">
                <div>
                    <x-jet-input class="block mt-1 w-full" type="text"
                    wire:model.debounce.500ms="keyword" wire:keydown.debounce.500ms='search'/>
                </div>
                <div class="relative">
                    @if($results)
                        <ul class="mt-2 py-2 px-4 bg-white rounded-lg absolute w-full">
                            @forelse($results as $result)
                                <li class="pt-2 pb-1">
                                    <a href="{{ route('movie',$result->id??0) }}" class="font-bold">
                                        <div class="flex bg-gradient-to-r from-slate-50 to-slate-300 rounded-sm">
                                            <img class="object-cover h-30 w-20" 
                                                src="https://image.tmdb.org/t/p/original/{{ $result->poster_path??'' }}"
                                                onError="this.onerror=null; this.src='{{ asset('images/placeholders/movie-poster.png') }}'"
                                            >

                                            <div class="ml-2 p-2 overflow-hidden">
                                                <h3 class="text-lg truncate">{{ $result->title??'' }}</h3>
                                                <span class="text-blue-500 text-sm my-1">
                                                    {{ Carbon\Carbon::create($result->release_date??'')->format('Y') }} <i class="fa-solid fa-calendar-days"></i>
                                                </span>
                                                <div class="text-yellow-500 text-sm my-1">
                                                    {{ $result->vote_average??'' }} <i class="fa-solid fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <hr>
                            @empty
                                <li class="text-center">
                                    <span class="font-bold text-gray-400 text-lg">Nothing Found !!</span>
                                </li>
                            @endforelse
                            <li class="pt-2 pb-1 text-center">
                                <a href="#" class="font-bold text-lg text-blue-900">More Results</a>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </x-guest-layout>
</div>