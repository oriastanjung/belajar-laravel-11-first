<x-layout>
    <x-slot:title_layout>{{ $title }}</x-slot:title_layout>
    <h1 class="text-3xl font-bold my-5">Test REST API dari Server Lain</h1>
    <ul class="grid grid-cols-1 md:grid-cols-3 gap-5">
        @foreach ($data as $item)
            <li
                class="bg-gray-100 rounded-lg shadow-2xl hover:border-black cursor-pointer duration-300 transition-all ease-in-out group border border-transparent overflow-hidden">
                <div class="w-full h-80 overflow-hidden">
                    <img src={{ $item['thumbnailUrl'] }}
                        class="group-hover:scale-125 duration-300 transition-all ease-in-out w-full  object-cover object-center" />
                </div>
                <div class="px-5 py-5">
                    <p class="font-medium">{{ $item['title'] }}</p>
                    <p>{{ $item['description'] }}</p>
                </div>
            </li>
        @endforeach
    </ul>
</x-layout>
