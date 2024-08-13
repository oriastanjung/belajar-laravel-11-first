@props(['active' => false])

<a {{ $attributes }}
    class="{{ !$active ? 'text-black hover:text-[#2347FA]' : 'hover:text-black text-[#2347FA]' }} block py-2 px-3 rounded md:bg-transparent md:p-0 "
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
