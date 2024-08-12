<x-layout-auth>
    <x-slot:title_layout>{{ $title }}</x-slot:title_layout>
    <form method="POST" action="{{ route('admin.login') }}" class="md:w-1/2 px-4 mx-auto bg-white p-10 rounded-3xl shadow-2xl">
        @csrf
        <h1 class="text-lg font-bold text-center uppercase">Login</h1>
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-black">Email : </label>
            <input type="email" id="email" name="email"
                class=" border text-blact text-sm rounded-2xl focus:ring-[#2347FA] focus:border-[#2347FA] block w-full p-2.5 bg-white border-gray-500"
                placeholder="name@flowbite.com" required />
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-black">
                Password : </label>
            <input type="password" name="password" id="password" placeholder="********"
                class="border text-blact text-sm rounded-2xl focus:ring-[#2347FA] focus:border-[#2347FA] block w-full p-2.5 border-gray-500"
                required />
        </div>
        <div class="flex items-start mb-5">
            <div class="flex items-center h-5">
                <input id="remember" type="checkbox" value=""
                    class="w-4 h-4 border text-blact text-sm rounded-2xl focus:ring-[#2347FA] focus:border-[#2347FA] block p-2.5 border-gray-500"
                    required />
            </div>
            <label for="remember" class="ms-2 text-sm font-medium text-black">Remember me</label>
        </div>
        <button type="submit"
            class="shadow-lg shadow-blue-400  text-blact text-sm text-white font-bold rounded-2xl bg-[#2347FA] block w-full p-2.5 focus:ring-0 outline-none ring-0 border-0 "
            class="text-white ">Submit</button>
    </form>

</x-layout-auth>
