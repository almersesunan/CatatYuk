<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>Lending</title> --}}

    {{-- CSS --}}
    <link href="/css/pdf.css" rel="stylesheet">
    
</head>
<body>
    <br>
    <br>
    <br>
    <h2>Payable</h2>
    <table class="blueTable">
        <thead>
          <tr align="center">
            <th>No</th>
            <th>Name</th>
            <th>Date</th>
            <th>Due Date</th>
            <th>Description</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($payable as $payable)
          <tr>
            <td align="center">{{$loop->iteration}}</td>
            <td>{{$payable->py_name}}</td>
            <td align="center">{{$payable->py_date}}</td>
            <td align="center">{{$payable->due_date}}</td>
            <td>{{$payable->description}}</td>
            <td align="right">Rp. {{$payable->py_amount}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <br><br>
      <h2>Receivable</h2>
      <table class="blueTable">
        <thead>
          <tr align="center">
            <th>No</th>
            <th>Name</th>
            <th>Date</th>
            <th>Due Date</th>
            <th>Description</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($receivable as $receivable)
            <tr>
            <td align="center">{{$loop->iteration}}</td>
            <td>{{$receivable->rc_name}}</td>
            <td align="center">{{$receivable->rc_date}}</td>
            <td align="center">{{$receivable->rc_due_date}}</td>
            <td>{{$receivable->rc_description}}</td>
            <td align="right">Rp. {{$receivable->rc_amount}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
</body>
</html>