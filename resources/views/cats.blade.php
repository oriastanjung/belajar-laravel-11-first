<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cats</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="container mx-auto">
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
</body>

</html>
