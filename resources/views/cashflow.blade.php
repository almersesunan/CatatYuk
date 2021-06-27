@extends('layouts/main')

@section('title', 'CatatYuk - Cashflow')

@section('container')
  <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  
          <div class="card-body">
            <h1 class="h2">Cashflow</h1>
            @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
            @endif
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
                @foreach ($cashflow as $cashflow)
                <tr>
                  <td>{{$cashflow->tipe}}</td>
                  <td>{{$cashflow->tanggal}}</td>
                  <td>{{$cashflow->kategori}}</td>
                  <td>{{$cashflow->deskripsi}}</td>
                  <td>Rp. {{$cashflow->nominal}}</td>
                  <td>{{$cashflow->bukti_transaksi}}</td>
                  <td align="center">
                    <button id="edit_trs" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#edit"><i class="fa fa-edit"></i> Edit</button>
                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                  </td>
                </tr>
                @endforeach
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

          <form method="post" action="cashflow">
            @csrf
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label" for="tipe">Tipe</label>
                <select name="tipe" class="form-select" aria-label="Default select example">
                  <option selected>Choose..</option>
                  <option value="Pemasukan">Pemasukan</option>
                  <option value="Pengeluaran">Pengeluaran</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label" for="tanggal">Tanggal</label>
                <input name="tanggal" class="form-control" placeholder="yyyy-mm-dd" id="tanggal" required>
              </div>
              <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input name="kategori" type="input" class="form-control" id="kategori" placeholder="Makanan" required>
              </div>
              <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3"></textarea>
              </div>
              <div class="mb-3">
                <label for="nominal" class="form-label">Nominal</label>
                <input name="nominal" type="input" class="form-control" id="nominal" placeholder="Rp. 0,00" required>
              </div>
              <div class="mb-3">
                <label for="bukti_transaksi" class="form-label">Bukti Transaksi</label>
                <input name="bukti_transaksi" type="file" class="form-control-file" id="bukti_transaksi">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </form>
          
        </div>
      </div>
    </div>
    <script>
      $('#tanggal').datepicker({
          uiLibrary: 'bootstrap5',
          format: 'yyyy-mm-dd'
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

    $(document).ready(function(){
      $('.alert-success').fadeIn().delay(5000).fadeOut();
    });
  </script>
@endsection