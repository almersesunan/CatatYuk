<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/app.css">

    <title>CatatYuk</title>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
            CatatYuk
          </a>  
        </div>
        <div class="div">
            <select id="dropdown">
                <option>Tambah Buku Baru</option>
                <option value="programmer">Current Book</option>
                <option value="designer">New Book</option>
            </select><br>
        </div>
    </nav>
    
    <ul>
        <li><a href="#">Book Name</a>
            <ul>
                <li><input name="#" type="submit" id="submit" value="Tambah Bisnis Baru"></li>
            </ul>
        </li>
    </ul>
    <ul>
        <li><a href="#">Name</a>
            <ul>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </li>
    </ul>
    <ul>
            <li><a href="#">Menu</a>
                <ul>
                    <li><a href="#">Summary</a></li>
                    <li><a href="#">Pencatatan Kas</a></li>
                    <li><a href="#">Stok Barang</a></li>
                    <li><a href="#">Hutang/Piutang</a></li>
                </ul>
            </li>
        </ul>
        <br>
        <center>
            <div class="container">
                    <a href="#">Download to PDF</a><br>
                    <label for="uname">Laporan Kas</label><br>
                    <label for="pwd">Stok Barang</label><br>
                    <label for="pwd">Hutang</label><br>
                    <label for="pwd">Piutang</label><br><br>
            </div>
        </center>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>