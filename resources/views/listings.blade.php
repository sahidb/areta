<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listings</title>
</head>

<body>
    <h1>{{$heading}}</h1>

    <!-- @if (count($listings) == 0)
    <h2>No Listings found</h2>
    @endif -->
    @unless (count($listings) == 0)
    @foreach ($listings as $listing)
    <h2>{{$listing['title']}}</h2>
    <p>{{$listing['description']}}</p>
    @endforeach
    @else
    <h2>No Listings found</h2>
    @endunless

</body>

</html>