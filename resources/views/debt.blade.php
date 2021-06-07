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
              </tbody>
            </table>
            <br><br><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">Tambah Hutang</button>
            <br/><br/><br/><br/><br/><br/>
            <table id="table1" class="table table-striped table-bordered" style="width:100%">
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
            <br><br><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah1">Tambah Piutang</button>
          </div>
        </div>
      </div>    
    </body>
  </div>     
    

    <!-- Modal Edit Hutang -->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="edithutang" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalEdit">Edit Hutang</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class="control-label" for="nm_brg">Nama</label>
              <input type="text" name="nm_brg" class="form-control" id="nm_brng" required>
            </div>
            <div class="form-group">
              <label class="control-label" for="tgl_brg">Tanggal</label>
              <input type="text" name="tgl_brg" class="form-control" id="tgl_brng" required>
            </div>
            <div class="form-group">
              <label class="control-label" for="jthtmp_brg">Jatuh Tempo</label>
              <input type="text" name="jthtmp_brg" class="form-control" id="jthtmp_brng" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="ktr_brg">Keterangan</label>
                <input type="text" name="ktr_brg" class="form-control" id="ktr_brng" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="jmlh_brg">Jumlah</label>
                <input type="text" name="jmlh_brg" class="form-control" id="jmlh_brng" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Edit Piutang -->
    <div class="modal fade" id="edit1" tabindex="-1" aria-labelledby="editpiutang" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ModalEdit1">Edit Piutang</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label class="control-label" for="nm_brg">Nama</label>
                <input type="text" name="nm_brg" class="form-control" id="nm_brng" required>
              </div>
              <div class="form-group">
                <label class="control-label" for="tgl_brg">Tanggal</label>
                <input type="text" name="tgl_brg" class="form-control" id="tgl_brng" required>
              </div>
              <div class="form-group">
                <label class="control-label" for="jthtmp_brg">Jatuh Tempo</label>
                <input type="text" name="jthtmp_brg" class="form-control" id="jthtmp_brng" required>
              </div>
              <div class="form-group">
                  <label class="control-label" for="ktr_brg">Keterangan</label>
                  <input type="text" name="ktr_brg" class="form-control" id="ktr_brng" required>
              </div>
              <div class="form-group">
                  <label class="control-label" for="jmlh_brg">Jumlah</label>
                  <input type="text" name="jmlh_brg" class="form-control" id="jmlh_brng" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </div>

    <!-- Modal Tambah Hutang -->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahhutang" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalTambah">Tambah Hutang</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label class="control-label" for="nm_brg">Nama</label>
                <input type="text" name="nm_brg" class="form-control" id="nm_brng" required>
              </div>
              <div class="form-group">
                <label class="control-label" for="tgl_brg">Tanggal</label>
                <input type="text" name="tgl_brg" class="form-control" id="tgl_brng" required>
              </div>
              <div class="form-group">
                <label class="control-label" for="jthtmp_brg">Jatuh Tempo</label>
                <input type="text" name="jthtmp_brg" class="form-control" id="jthtmp_brng" required>
              </div>
              <div class="form-group">
                  <label class="control-label" for="ktr_brg">Keterangan</label>
                  <input type="text" name="ktr_brg" class="form-control" id="ktr_brng" required>
              </div>
              <div class="form-group">
                  <label class="control-label" for="jmlh_brg">Jumlah</label>
                  <input type="text" name="jmlh_brg" class="form-control" id="jmlh_brng" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Tambah Piutang -->
    <div class="modal fade" id="tambah1" tabindex="-1" aria-labelledby="tambahpiutang" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ModalTambah1">Tambah Piutang</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                  <label class="control-label" for="nm_brg">Nama</label>
                  <input type="text" name="nm_brg" class="form-control" id="nm_brng" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="tgl_brg">Tanggal</label>
                  <input type="text" name="tgl_brg" class="form-control" id="tgl_brng" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="jthtmp_brg">Jatuh Tempo</label>
                  <input type="text" name="jthtmp_brg" class="form-control" id="jthtmp_brng" required>
                </div>
                <div class="form-group">
                    <label class="control-label" for="ktr_brg">Keterangan</label>
                    <input type="text" name="ktr_brg" class="form-control" id="ktr_brng" required>
                </div>
                <div class="form-group">
                    <label class="control-label" for="jmlh_brg">Jumlah</label>
                    <input type="text" name="jmlh_brg" class="form-control" id="jmlh_brng" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary">Simpan</button>
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
      var table = $('#table, #table1').DataTable( {
      lengthChange: false
    } );
  
    table.buttons().container()
      .appendTo( '#table_wrapper .col-md-6:eq(0)' );
    } );
  </script>
@endsection