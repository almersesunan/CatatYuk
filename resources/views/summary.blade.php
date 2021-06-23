@extends('layouts/main')

@section('title', 'CatatYuk')
    
@section('container')
<div class="container all-summary mt-5 mb-5">
  <div class="frame" style="border-style: hidden">
    <a href="#">Download to PDF</a><br>
    <div class="summary-item">
      <label for="uname">Laporan Kas</label><br>
      <label><input type="radio" name="cashflow" value="pemasukan" checked>Pemasukan</label>
      <label><input type="radio" name="cashflow" value="pengeluaran">Pengeluaran</label>
      <div id="cashflowchart"></div>
    </div>
    <div class="summary-item">
      <label for="pwd">Stok Barang</label><br>
      <div id="stokbarangchart"></div>
    </div>
    <div class="summary-item">
      <label for="pwd">Hutang</label><br>
      <div style="height:390px;overflow:auto;">
        <table id="table-hutang" class="table table-striped table-bordered" style="width:100%">
          <a href="#" style="float: right">Download to PDF</a>
          <label for="pwd">Hutang</label><br>
          <thead>
            <tr>
              <th>Nama</th>
              <th>Tanggal</th>
              <th>Jatuh Tempo</th>
              <th>Keterangan</th>
              <th>Jumlah</th>
              <th>Edit</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Danny</td>
              <td>4/6/2021</td>
              <td>7/6/2021</td>
              <td>Test</td>
              <td>Rp.1000000</td>
              <td align="center">
                <button id="edit_htng" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#edit"><i class="fa fa-edit"></i> Edit</button>
                <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
              </td>
            </tr>
            <tr>
                <td>Bagus</td>
                <td>4/6/2021</td>
                <td>7/6/2021</td>
                <td>Test</td>
                <td>Rp.1000000</td>
                <td align="center">
                  <button id="edit_htng" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#edit"><i class="fa fa-edit"></i> Edit</button>
                  <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                </td>
            </tr>
            <tr>
              <td>Tono</td>
              <td>4/6/2021</td>
              <td>7/6/2021</td>
              <td>Test</td>
              <td>Rp.150000</td>
              <td align="center">
                <button class="btn btn-secondary"><i class="fa fa-edit"></i> Edit</button>
                <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
              </td>
            </tr>
            <tr>
              <td>Tono</td>
              <td>4/6/2021</td>
              <td>7/6/2021</td>
              <td>Test</td>
              <td>Rp.150000</td>
              <td align="center">
                <button class="btn btn-secondary"><i class="fa fa-edit"></i> Edit</button>
                <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
              </td>
            </tr>
          </tbody>
        </table>
       </div>
    </div>
    <div class="summary-item">
      <label for="pwd">Piutang</label><br>
      <div style="height:390px;overflow:auto;">
        <table id="table-piutang" class="table table-striped table-bordered" style="width:100%">
          <a href="#" style="float: right">Download to PDF</a>
          <label for="pwd">Piutang</label><br>
          <thead>
            <tr>
              <th>Nama</th>
              <th>Tanggal</th>
              <th>Jatuh Tempo</th>
              <th>Keterangan</th>
              <th>Jumlah</th>
              <th>Edit</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Danny</td>
              <td>4/6/2021</td>
              <td>7/6/2021</td>
              <td>Test</td>
              <td>Rp.1000000</td>
              <td align="center">
                <button id="edit_ptng" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#edit1"><i class="fa fa-edit"></i> Edit</button>
                <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
              </td>
            </tr>
            <tr>
              <td>Tono</td>
              <td>4/6/2021</td>
              <td>7/6/2021</td>
              <td>Test</td>
              <td>Rp.150000</td>
              <td align="center">
                <button class="btn btn-secondary"><i class="fa fa-edit"></i> Edit</button>
                <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
              </td>
            </tr>
          </tbody>
        </table>
       </div>
    </div>
  </div>    
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="js/main.js"></script>

<!--JANGAN DIAPA APAIN-->
{{-- <script src="{{asset('js/jquery.min.js')}}"></script> --}}
{{-- <script src="/js/main.js"></script> --}}
{{-- <script>
  $(document).ready(function(){
    $('#cashflow').on('change', function(){
    var n = $(this).val();
    switch(n)
    {
            case '1':
                  document.getElementById('#show').innerHTML="1st radio button";
                  break;
            case '2':
                  document.getElementById('#show').innerHTML="2nd radio button";
                  break;
            case '3':
                  document.getElementById('#show').innerHTML="3rd radio button";
                  break;
        }
    });
</script> --}}

@endsection