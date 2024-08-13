<nav x-data="{ isOpen: false }" class="bg-white bg-opacity-45 backdrop-blur-md text-black fixed top-0 z-[100] w-full">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto py-5 px-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap">VacaCity</span>
        </a>
        <button x-on:click="isOpen = !isOpen" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg md:hidden  focus:outline-none focus:ring-2 text-black hover:bg-white focus:ring-gray-600">

            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4  md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 ">
                <li>
                    <x-navlink href="/" >Home</x-navlink>
                </li>
                <li>
                    <x-navlink href="#places">Places</x-navlink>
                </li>
                <li>
                    <x-navlink href="#about">About</x-navlink>
                </li>

            </ul>
        </div>
        <div x-show="isOpen" x-transition class=" w-full md:w-auto fixed z-[100] top-12 left-0" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 bg-white">
                <li>
                    <x-navlink href="/" >Home</x-navlink>
                </li>
                <li>
                    <x-navlink href="#places" >Places</x-navlink>
                </li>
                <li>
                    <x-navlink href="#about" >About</x-navlink>
                </li>
            </ul>
        </div>
    </div>
</nav>
