@props(['data'])

<div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "autoPlay": 3000 ,"prevNextButtons": false }'>
    @foreach($data as $place)
        <a href="{{ route('places.byid', $place->id) }}" class="carousel-cell w-full max-w-[35rem] cursor-pointer h-[20rem] mr-4 relative rounded-lg group overflow-hidden">
            <img src="{{ asset($place->thumbnail) }}" alt="Image {{ $loop->index + 1 }}" class="carousel-image w-full h-full object-cover block absolute top-0 group-hover:scale-125 duration-300 ease-in-out transition-all transform">
            
            <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-white opacity-0 group-hover:opacity-100 transition-all duration-300 ease-in-out z-[1]">
                <p class="text-lg font-bold">{{ $place->name }}</p>
                <p class="text-sm">{{ $place->location }}</p>
                <p class="text-sm">Fee : Rp{{ $place->price }}</p>
            </div>
        </a>
    @endforeach
</div>
