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
                    <x-jet-input class="block mt-1 w-full" type="search"
                    wire:model.debounce.500ms="keyword" wire:keydown.debounce.500ms='search'/>
                </div>
                <div class="relative">
                    @if($results)
                        <ul class="mt-2 py-2 px-4 bg-white rounded-lg absolute w-full">
                            @forelse($results as $result)
                                <li class="pt-2 pb-1">
                                    <a href="#" class="font-bold">{{ $result->title }}</a>
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