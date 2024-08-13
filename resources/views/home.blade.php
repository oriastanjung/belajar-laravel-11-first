<x-layout>
    <x-slot:title_layout>{{ $title }}</x-slot:title_layout>
    <x-carousel :images="$carousel"></x-carousel>
    <main class="max-w-screen-xl p-4 mx-auto my-10 min-h-screen">
        <h1 class="font-bold text-2xl">Recommendation Places</h1>
        <section id="places" class="my-10">
            <x-home-places-slider :data="$dataPlace"></x-home-places-slider>
        </section>

        <section id="about" class="my-10 p-4 bg-gray-100 rounded-lg">
            <h2 class="font-bold text-2xl  text-center mb-4">About</h2>
            <p class="text-center">
                This application is designed to help you discover and explore various vacation spots. Built with Laravel 11, it provides an easy-to-use interface to search for and view details about different locations for your next getaway.
            </p>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-[#2347fa] text-white py-4">
        <div class="max-w-screen-xl mx-auto text-center">
            <p>&copy; 2024 Oriastanjung. All rights reserved.</p>
        </div>
    </footer>
</x-layout>
