
<x-layout>
    <x-slot:title_layout>{{ $place->name }}</x-slot:title_layout>
    <main class="max-w-screen-xl p-4 mx-auto my-10 min-h-screen">
        <div class="container mx-auto p-4">
            <div class=" rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4 text-center">{{ $place->name }}</h1>
                <img src="{{ asset($place->thumbnail) }}" alt="{{ $place->name }}" class="w-full h-auto rounded-lg mb-4">
                <p class="text-lg mb-2"><strong>Location:</strong> {{ $place->location }}</p>
                <p class="text-lg mb-2"><strong>Price:</strong> Rp{{ $place->price }}</p>
                <p class="text-lg"><strong>Stars:</strong> {{ $place->stars }}</p>
            </div>
        </div>
    </main>
</x-layout>
