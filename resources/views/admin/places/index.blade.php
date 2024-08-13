<x-layout-admin>
    <x-slot:title_layout>{{ $title }}</x-slot:title_layout>

    <section class="mt-20 px-10 ">
        <div class="flex justify-between items-center mb-6">
            <h1 class="font-bold text-xl">Places Management</h1>
            <a class="bg-zinc-800 px-3 py-2 rounded-lg text-white" href="{{ route('places.create') }}">+Place</a>
        </div>
        <div class="max-w-sm lg:max-w-fit overflow-x-auto">
            <table class=" bg-white rounded-lg shadow-md ">
                <thead class="bg-zinc-800 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">No</th>
                        <th class="py-3 px-4 text-left">Name</th>
                        <th class="py-3 px-4 text-left">Location</th>
                        <th class="py-3 px-4 text-left">Price</th>
                        <th class="py-3 px-4 text-left">Stars</th>
                        <th class="py-3 px-4 text-left">Thumbnail</th>
                        <th class="py-3 px-4 text-left">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($places as $index => $place)
                    <tr class="border-b">
                        <td class="py-3 px-4">{{ $index + 1 }}</td>
                        <td class="py-3 px-4">{{ $place->name }}</td>
                        <td class="py-3 px-4">{{ $place->location }}</td>
                        <td class="py-3 px-4">${{ number_format($place->price, 2) }}</td>
                        <td class="py-3 px-4">{{ $place->stars }} / 5</td>
                        <td class="py-3 px-4">
                            <img src="{{ asset($place->thumbnail) }}" alt="{{ $place->name }}" class="w-16 h-16 object-cover rounded-lg">
                        </td>
                        <td class="py-3 px-4 flex gap-2">
                            <a href="{{ route('places.edit', $place->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md">Edit</a>
                            <form action="{{ route('places.destroy', $place->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </section>
</x-layout-admin>
