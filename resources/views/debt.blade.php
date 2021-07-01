@extends('layouts/main')

@section('title', 'CatatYuk - Lending')

@section('container')
  <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">   
          <div class="card-body">
            <h1 class="h2">Payable</h1>
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
                @foreach ($payable as $payable)
                <tr>
                  <td>{{$payable->py_name}}</td>
                  <td>{{$payable->py_date}}</td>
                  <td>{{$payable->due_date}}</td>
                  <td>{{$payable->description}}</td>
                  <td>Rp. {{$payable->py_amount}}</td>
                  <td align="center">
                    <button id="edit_htng" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#edit"><i class="fa fa-edit"></i> Edit</button>
                    <form action="debt/{{$payable->py_id}}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                      <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            
            <br><br><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">Tambah Hutang</button>
            <br/><br/><br/><br/>
            <h1 class="h2">Receiveable</h1>
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
                </tbody>
              </table>
            <br><br><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah1">Tambah Piutang</button>
          </div>
         
    

    <!-- Modal Edit Hutang -->
  <html>
    <head>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    </head>
    
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="edithutang" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalEditHutang">Edit Hutang</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label" for="NamaHutang">Nama</label>
              <input type="text" name="NamaHutang" class="form-control" id="NamaHutang" required>
            </div>
            <div class="mb-3">
              <label class="form-label" for="TanggalHutang">Tanggal</label>
              <input name="TanggalHutang" class="form-control" id="TanggalHutang" required>
            </div>
            <div class="mb-3">
              <label class="form-label" for="JatuhTempoHutang">Jatuh Tempo</label>
              <input name="JatuhTempoHutang" class="form-control" id="JatuhTempoHutang" required>
            </div>
            <div class="mb-3">
              <label class="form-label" for="KeteranganHutang">Keterangan</label>
              <textarea class="form-control" id="KeteranganHutang" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label" for="JumlahHutang">Jumlah</label>
                <input type="text" name="JumlahHutang" class="form-control" id="JumlahHutang" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Simpan</button>
          </div>
        
        </div>
      </div>
    </div>
      <script>
        $('#TanggalHutang').datepicker({
            uiLibrary: 'bootstrap5',
            format: 'dd-mm-yyyy'
        });
      </script>
      <script>
        $('#JatuhTempoHutang').datepicker({
            uiLibrary: 'bootstrap5',
            format: 'dd-mm-yyyy'
        });
      </script>
    
    <!-- Modal Edit Piutang -->
    <div class="modal fade" id="edit1" tabindex="-1" aria-labelledby="editpiutang" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ModalEditPiutang">Edit Piutang</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label" for="NamaPiutang">Nama</label>
                <input name="NamaPiutang" class="form-control"  id="NamaPiutang" required>
              </div>
              <div class="mb-3">
                <label class="form-label" for="TanggalPiutang">Tanggal</label>
                <input type="text" name="TanggalPiutang" class="form-control" id="TanggalPiutang" required>
              </div>
              <div class="mb-3">
                <label class="form-label" for="JatuhTempoPiutang">Jatuh Tempo</label>
                <input type="text" name="JatuhTempoPiutang" class="form-control" id="JatuhTempoPiutang" required>
              </div>
              <div class="mb-3">
                <label class="form-label" for="KeteranganPiutang">Keterangan</label>
                <textarea class="form-control" id="KeteranganPiutang" rows="3" required></textarea>
              </div>
              <div class="mb-3">
                  <label class="form-label" for="JumlahPiutang">Jumlah</label>
                  <input type="text" name="JumlahPiutang" class="form-control" id="JumlahPiutang" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Simpan</button>
            </div>

          </div>
        </div>
      </div>
      <script>
        $('#TanggalPiutang').datepicker({
            uiLibrary: 'bootstrap5',
            format: 'dd-mm-yyyy'
        });
      </script>
      <script>
        $('#JatuhTempoPiutang').datepicker({
            uiLibrary: 'bootstrap5',
            format: 'dd-mm-yyyy'
        });
      </script>
    
    <!-- Modal Tambah Hutang -->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahhutang" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalTambahHutang">Tambah Hutang</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <form method="post" action="debt">
            @csrf
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label" for="py_name">Nama</label>
                <input type="text" name="py_name" placeholder="Masukan Nama" class="form-control @error('py_name') is-invalid @enderror" id="py_name">
                @error('py_name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="py_date">Tanggal</label>
                <input name="py_date" class="form-control @error('py_date') is-invalid @enderror" placeholder="yyyy-mm-dd" id="py_date">
                @error('py_date')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="due_date">Jatuh Tempo</label>
                <input type="text" name="due_date" class="form-control @error('due_date') is-invalid @enderror" placeholder="yyyy-mm-dd" id="due_date">
                @error('due_date')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="description">Keterangan</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Masukan keterangan" rows="3"></textarea>
                @error('description')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                  <label class="form-label" for="py_amount">Jumlah</label>
                  <input type="text" name="py_amount" class="form-control @error('py_amount') is-invalid @enderror" placeholder="0,00" id="py_amount">
                  @error('py_amount')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
          
        </div>
      </div>
    </div>
    <script>
      $('#py_date').datepicker({
          uiLibrary: 'bootstrap5',
          format: 'yyyy-mm-dd'
      });
    </script>
    <script>
      $('#due_date').datepicker({
          uiLibrary: 'bootstrap5',
          format: 'yyyy-mm-dd'
      });
    </script>
  

    <!-- Modal Tambah Piutang -->
      <div class="modal fade" id="tambah1" tabindex="-1" aria-labelledby="tambahpiutang" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalTambahPiutang">Tambah Piutang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              
              <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label" for="NamaPiutang1">Nama</label>
                    <input type="text" name="NamaPiutang1" class="form-control" placeholder="Masukan nama" id="NamaPiutang1" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="TanggalPiutang1">Tanggal</label>
                    <input name="TanggalPiutang1" class="form-control" placeholder="dd-mm-yyyy" id="TanggalPiutang1" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="JatuhTempoPiutang1">Jatuh Tempo</label>
                    <input type="text" name="JatuhTempoPiutang1" class="form-control" placeholder="dd-mm-yyyy" id="JatuhTempoPiutang1" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="KeteranganPiutang1">Keterangan</label>
                    <textarea class="form-control" id="KeteranganPiutang1" placeholder="Masukan keterangan" rows="3" required></textarea>
                  </div>
                  <div class="mb-3">
                      <label class="form-label" for="JumlahPiutang1">Jumlah</label>
                      <input type="text" name="JumlahPiutang1" class="form-control" placeholder="0,00" id="JumlahPiutang1" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary">Simpan</button>
                </div>

            </div>
          </div>
        </div>
        <script>
            $('#TanggalPiutang1').datepicker({
                uiLibrary: 'bootstrap5',
                format: 'dd-mm-yyyy'
            });
        </script>
        <script>
          $('#JatuhTempoPiutang1').datepicker({
              uiLibrary: 'bootstrap5',
              format: 'dd-mm-yyyy'
          });
      </script>
</html>

      
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
  {{-- Hold Modal After Validation Error --}}
  @if (count($errors) > 0)
    <script>
      $( document ).ready(function() {
      $('#tambah').modal('show');
      });
    </script>
  @endif
@endsection