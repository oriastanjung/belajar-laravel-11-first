<x-layout>
    <x-slot:title_layout>{{ $title }}</x-slot:title_layout>
    <ul>
        @foreach ($data as $item)
            <li>{{ $item['title'] }}</li>
        @endforeach
    </ul>
</x-layout>
