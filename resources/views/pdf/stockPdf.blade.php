<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>Stock</title> --}}

    {{-- CSS --}}
    <link href="/css/pdf.css" rel="stylesheet">
    
</head>
<body>
    <br>
    <br>
    <br>
    <table class="blueTable">
        <thead>
            <tr align="center">
              <th>No</th>
              <th>Item Name</th>
              <th>Minimum</th>
              <th>Available</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stock as $stock)
            <tr>
              <td align="center">{{$loop->iteration}}</td>
              <td>{{$stock->item_name}}</td>
              <td align="center">{{$stock->minimum}}</td>
              <td align="center">{{$stock->available}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>