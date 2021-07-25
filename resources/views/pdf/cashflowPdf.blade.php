<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>Cashflow</title> --}}

    {{-- CSS --}}
    <link href="/css/pdf.css" rel="stylesheet">
    
</head>
<body>
    <br>
    <br>
    <br>
    <table class="blueTable">
        <thead>
          <tr align=center>
            <th>No</th>
            <th>Transaction Type</th>
            <th>Transaction Date</th>
            <th>Category</th>
            <th>Description</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($cashflow as $cashflow)
            <tr>
              <td align=center>{{$loop->iteration}}</td>
              <td>{{$cashflow->type}}</td>
              <td align=center>{{$cashflow->tr_date}}</td>
              <td>{{$cashflow->category}}</td>
              <td>{{$cashflow->description}}</td>
              <td align=right>{{$cashflow->tr_amount}}</td>
            </tr>
          @endforeach
        </tbody>
    </table>
</body>
</html>