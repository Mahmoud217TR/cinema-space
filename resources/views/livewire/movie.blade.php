@section('title', $movie['title'])
<div class="backdrop-blur-sm h-screen">
    <div class="container h-96 mx-auto relative">
        <img class="objcet-fit h-96 w-full rounded-b-md" src="https://image.tmdb.org/t/p/original/{{ $movie['backdrop_path'] }}">
        <div class="h-60 w-40 rounded-md border-4 border-slate-50 overflow-hidden absolute bottom-0 left-10 translate-y-1/3">
            <img class="h-60 w-40 objcet-fit" src="https://image.tmdb.org/t/p/original/{{ $movie['poster_path'] }}">
        </div>
    </div>
    <div class="container mx-auto">
        <div class="grid gap-2 grid-cols-2">
            <div class="col-span-2">
                <h1 class="ml-52 mt-5 text-slate-50 text-4xl">{{ $movie['title'] }}</h1>
            </div>
            <div class="">
                test
            </div>
        </div>
    </div>
</div>
