@extends('layouts/main')

@section('title', 'CatatYuk')

@section('container')
<link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">  
    <div class="summary-item">
        <body>
          <div class="container">
            <div class="card mt-5">
              <div class="card-body" style="border: 4px solid">
                <table id="table" class="table table-striped table-bordered" style="width:100%">
                  <a href="#" style="float: right">Download to PDF</a>
                  <label for="pwd">Pencatatan Kas</label><br>
                  <thead>
                      <tr>
                        <th>Tipe</th>
                        <th>Tanggal</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Nominal</th>
                        <th>Bukti Transaksi</th>
                        <th>Edit</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>Pemasukan</td>
                          <td>6/4/2021</td>
                          <td>Pakaian</td>
                          <td>Test</td>
                          <td>Rp.1000000</td>
                          <td>-</td>
                          <td align="center">
                            <button id="edit_brg" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#edit"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                            </td>
                      </tr>
                      <tr>
                          <td>Pengeluaran</td>
                          <td>6/4/2021</td>
                          <td>Makanan</td>
                          <td>Test</td>
                          <td>Rp.150000</td>
                          <td>-</td>
                          <td align="center">
                            <button class="btn btn-secondary"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                          </td>
                      </tr>
                  </tbody>
          </table>
          <br><br><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">Tambah Transaksi</button>

<!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editbarang" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalEdit">Edit Transaksi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label class="control-label" for="nm_brg">Tipe</label>
                <input type="text" name="nm_brg" class="form-control" id="nm_brng" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="mini_brg">Tanggal</label>
                <input type="text" name="mini_brg" class="form-control" id="mini_brng" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="stok_brg">Nominal</label>
                <input type="text" name="stok_brg" class="form-control" id="stok_brng" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="stok_brg">Kategori</label>
                <input type="text" name="stok_brg" class="form-control" id="stok_brng" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="stok_brg">Bukti Transaksi</label>
                <input type="text" name="stok_brg" class="form-control" id="stok_brng" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="stok_brg">Deskripsi</label>
                <input type="text" name="stok_brg" class="form-control" id="stok_brng" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Tambah -->
  <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahbarang" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalTambah">Transaksi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label class="control-label" for="nm_brg">Tipe</label>
                <input type="text" name="nm_brg" class="form-control" id="nm_brng" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="mini_brg">Tanggal</label>
                <input type="text" name="mini_brg" class="form-control" id="mini_brng" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="stok_brg">Nominal</label>
                <input type="text" name="stok_brg" class="form-control" id="stok_brng" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="stok_brg">Kategori</label>
                <input type="text" name="stok_brg" class="form-control" id="stok_brng" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="stok_brg">Bukti Transaksi</label>
                <input type="text" name="stok_brg" class="form-control" id="stok_brng" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="stok_brg">Deskripsi</label>
                <input type="text" name="stok_brg" class="form-control" id="stok_brng" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
        </div>
            </div>
      
          <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
          <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
          <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
          <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
          <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap4.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
          <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>

          <script>
          $(document).ready(function() {
              var table = $('#table').DataTable( {
              lengthChange: false
          } );
       
          table.buttons().container()
              .appendTo( '#table_wrapper .col-md-6:eq(0)' );
          } );
          </script>
        </body>
@endsection