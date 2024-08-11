<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cats</title>
</head>
<body>
    <h1>Test REST API dari Server Lain</h1>
    <ul>
        @foreach ($data as  $item)
        <li>
            <img src={{ $item['thumbnailUrl'] }} width="150" />
            <p>{{ $item['title'] }}</p>
            <p>{{ $item['description'] }}</p>
        </li>
        
        @endforeach
    </ul>
</body>
</html>