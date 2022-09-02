<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div>
            <a href="/">
                @include('partials.logo-with-writing',['width'=>300,'height'=>200])
            </a>
        </div>
        <div class="w-full sm:max-w-md mt-6 shadow-md sm:rounded-lg">
            <form method="GET" action="#">
                @csrf
    
                <div>
                    <x-jet-input id="search" class="block mt-1 w-full" type="search" name="search" :value="old('search')" required autofocus />
                </div>
    
            </form>
        </div>
    </div>
</x-guest-layout>