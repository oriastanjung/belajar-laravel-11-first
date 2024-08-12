<x-layout-admin>
    <x-slot:title_layout>{{ $title }}</x-slot:title_layout>

    <section class="mt-20 px-10">
        <div class="flex justify-between items-center mb-6">
            <h1 class="font-bold text-xl">Create Place</h1>
        </div>
        <form action="{{ route('places.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
            </div>
            <div class="mb-6">
                <label for="location" class="block text-sm font-medium text-gray-700">Location:</label>
                <input type="text" id="location" name="location" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
            </div>
            <div class="mb-6">
                <label for="price" class="block text-sm font-medium text-gray-700">Price:</label>
                <input type="number" id="price" name="price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" step="0.01" required />
            </div>
            <div class="mb-6">
                <label for="stars" class="block text-sm font-medium text-gray-700">Stars:</label>
                <input type="number" id="stars" name="stars" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" min="1" max="5" required />
            </div>
            <div class="mb-6">
                <label for="thumbnail" class="block text-sm font-medium text-gray-700">Thumbnail:</label>
                <input type="file" id="thumbnail" name="thumbnail" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" accept="image/*" required />
            </div>
            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-bold rounded-md shadow-sm hover:bg-blue-600">
                    Create Place
                </button>
            </div>
        </form>
    </section>
</x-layout-admin>
