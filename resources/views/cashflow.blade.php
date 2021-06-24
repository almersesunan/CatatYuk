@extends('layouts/main')

@section('title', 'CatatYuk')

@section('container')
  <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
          <div class="card-body">
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
                    <button id="edit_trs" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#edit"><i class="fa fa-edit"></i> Edit</button>
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
          </div>

    <!-- Modal Edit -->
  <html>
    <head>
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
      <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
    </head>
      <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="edittransaksi" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ModalEdit">Edit Transaksi</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label" for="Tipe">Tipe</label>
                <select class="form-select">
                  <option selected>Pemasukan/Pengeluaran</option>
                  <option value="1">Pemasukan</option>
                  <option value="2">Pengeluaran</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label"  for="Tanggal">Tanggal</label>
                <input name="Tanggal" class="form-control" placeholder="dd-mm-yyy" id="Tanggal" required>
              </div>
              <div class="mb-3">
                <label class="form-label"  for="Nominal">Nominal</label>
                <input type="text" name="Nominal" class="form-control" placeholder="Rp. 0,00" id="Nominal" required>
              </div>
              <div class="mb-3">
                  <label class="form-label"  for="Kategori">Kategori</label>
                  <input type="text" name="Kategori" class="form-control"  placeholder="Makanan" id="Kategori" required>
              </div>
              <form>
                <div class="mb-3">
                  <label class="form-label" for="BuktiTransaksi">Bukti Transaksi</label></br>
                  <input type="file" class="form-control-file" id="BuktiTransaksi">
                </div>
              </form>
              <div class="mb-3">
                <label for="Deskripsi">Deskripsi</label>
                <textarea class="form-control" id="Deskripsi" rows="3"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </div>
      <script>
        $('#Tanggal').datepicker({
            uiLibrary: 'bootstrap5',
            format: 'dd-mm-yyyy'
        });
      </script>

    <!-- Modal Tambah -->
    <div class="modal" id="tambah" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalTambah">Tambah Transaksi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label" for="Tipe1">Tipe</label>
              <select class="form-select" aria-label="Default select example">
                <option selected>Pemasukan/Pengeluaran</option>
                <option value="1">Pemasukan</option>
                <option value="2">Pengeluaran</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label" for="Tanggal1">Tanggal</label>
              <input name="Tanggal" class="form-control" placeholder="dd-mm-yyy" id="Tanggal1" required>
            </div>
            <div class="mb-3">
              <label for="Nominal1" class="form-label">Nominal</label>
              <input type="input" class="form-control" id="Nominal1" placeholder="Rp. 0,00" required>
            </div>
            <div class="mb-3">
              <label for="Kategori1" class="form-label">Kategori</label>
              <input type="input" class="form-control" id="Kategori1" placeholder="Makanan" required>
            </div>
            <form>
              <div class="mb-3">
                <label for="BuktiTransaksi1" class="form-label">Bukti Transaksi</label></br>
                <input type="file" class="form-control-file" id="BuktiTransaksi1">
              </div>
            </form>
            <div class="mb-3">
              <label for="Deskripsi1" class="form-label">Deskripsi</label>
              <textarea class="form-control" id="Deskripsi1" rows="3"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
    <script>
      $('#Tanggal1').datepicker({
          uiLibrary: 'bootstrap5',
          format: 'dd-mm-yyyy'
      });
    </script>
  </html>
  
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <!-- Table -->
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap4.min.js"></script>
  <!-- PDF di stock -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  

  <script>
    $(document).ready(function() {
      var table = $('#table').DataTable( {
      lengthChange: false
    } );
       
    table.buttons().container()
      .appendTo( '#table_wrapper .col-md-6:eq(0)' );
    } );
  </script>
@endsection