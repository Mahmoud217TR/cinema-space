@section('title', $movie['title'])
<div class="">
    <img class="object-fit h-screen w-full fixed" src="{{ $movie['backdrop'] }}"
    onError="this.onerror=null; this.src='{{ asset('images/backgrounds/background.svg') }}'">
    <div class="backdrop-blur-sm backdrop-brightness-50 bg-stone-800/30 h-screen">
        <div class="container pt-20 mx-auto">
            <div class="grid gap-2 grid-cols-2">
                <div class="col-span-2">
                    <div class="flex">
                        <div class="h-60 w-40 rounded-md border-4 border-slate-50 overflow-hidden">
                            <img class="h-60 w-40 objcet-fit" src="{{ $movie['poster'] }}"
                            onError="this.onerror=null; this.src='{{ asset('images/placeholders/movie-poster.png') }}'">
                        </div>
                        <div class="ml-4 mt-1">
                            <h1 class="text-slate-50 text-4xl">{{ $movie['title'] }}</h1>
                            <p class="ml-1 mt-4">
                                <span class="text-teal-400 block">
                                    <i class="fa-solid fa-film"></i> Status: {{ $movie['status'] }}
                                </span>
                                <span class="text-teal-400 block mt-2">
                                    <i class="fa-solid fa-calendar-days"></i> Release date: {{ $movie['date']->format('d-M-Y') }}
                                </span>
                                <span class="text-amber-400 block mt-2">
                                    <i class="fa-solid fa-star"></i> Rating: {{ $movie['rating'] }}
                                </span>
                                <span class="text-amber-400 block mt-2">
                                    <i class="fa-solid fa-user"></i> Voters: {{ $movie['voters'] }}
                                </span>
                                <span class="text-green-400 block mt-2">
                                    <i class="fa-solid fa-sack-dollar"></i></i> Budget: {{ $movie['budget'] }}
                                </span>
                                <span class="text-green-400 block mt-2">
                                    <i class="fa-solid fa-money-bill"></i> Revenue: {{ $movie['revenue'] }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <p class="text-slate-50">
                        {{ $movie['overview'] }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
