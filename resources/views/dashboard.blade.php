@extends('layouts/main')

@section('title', 'CatatYuk')
    
@section('container')
      <h1 class="h2">Summary</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
          <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
          <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
          <span data-feather="calendar"></span>
          This week
        </button>
      </div>
    </div>
    <label><input type="radio" name="cashflow" value="pemasukan" checked> Pemasukan</label><span class="tab"></span>
    <label><input type="radio" name="cashflow" value="pengeluaran"> Pengeluaran</label>
    <div id="cashflowchart"></div>
    <div id="stokbarangchart"></div>
    <h2>Loan</h2>
    <div class="table-responsive">
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
@endsection



