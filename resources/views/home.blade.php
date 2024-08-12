<x-layout>
    <x-slot:title_layout>{{ $title }}</x-slot:title_layout>
    <x-carousel :images="$carousel">
    </x-carousel>
    <main class="max-w-screen-xl p-4 mx-auto my-10 min-h-screen">
        <h1>Home Page</h1>

    </main>
</x-layout>
