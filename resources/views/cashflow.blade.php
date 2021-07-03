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
          <tr align=center>
            <th>Id</th>
            <th>Tipe</th>
            <th>Tanggal</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
            <th>Nominal</th>
            <th>Bukti Transaksi</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($cashflow as $cashflow)
            <tr>
              <td align=center>{{$cashflow->id}}</td>
              <td>{{$cashflow->tipe}}</td>
              <td align=center>{{$cashflow->tanggal}}</td>
              <td>{{$cashflow->kategori}}</td>
              <td>{{$cashflow->deskripsi}}</td>
              <td align=right>{{$cashflow->nominal}}</td>
              <td>{{$cashflow->bukti_transaksi}}</td>
              <td align=center>
                <button class="btn btn-secondary edit"><i class="fa fa-edit"></i> Edit</button>
                <form action="cashflow/{{$cashflow->id}}" method="POST" class="d-inline">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure want to delete this data?')"><i class="fa fa-trash"></i> Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <br><br><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">Add Transaction</button>
    </div>

    <!-- Modal Edit Transaction -->
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
            <h5 class="modal-title" id="ModalEdit">Edit Transaction</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
            <form id="form_edit" method="post" action="cashflow" enctype="multipart/form-data">
              @method('patch')
              @csrf
              <div class="modal-body" id="modal-edit">
                <div class="mb-3">
                  <label class="form-label" for="tipe_edit">Tipe</label>
                  <select name="tipe_edit" class="form-select @error('tipe') is-invalid @enderror" id="tipe_edit" aria-label="Default select example">
                    <option value="0"selected>Choose..</option>
                    <option value="Pemasukan">Pemasukan</option>
                    <option value="Pengeluaran">Pengeluaran</option>
                  </select>
                  @error('tipe')
                        <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label" for="tanggal_edit">Tanggal</label>
                  <input name="tanggal_edit" class="form-control @error('tanggal') is-invalid @enderror" placeholder="yyyy-mm-dd" id="tanggal_edit">
                  @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="kategori_edit" class="form-label">Kategori</label>
                  <input name="kategori_edit" type="input" class="form-control @error('kategori') is-invalid @enderror" id="kategori_edit" placeholder="Makanan">
                  @error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="deskripsi_edit" class="form-label">Deskripsi</label>
                  <textarea name="deskripsi_edit" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi_edit" rows="3"></textarea>
                  @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="nominal_edit" class="form-label">Nominal</label>
                  <input name="nominal_edit" type="input" class="form-control @error('nominal') is-invalid @enderror" id="nominal_edit" placeholder="Rp. 0">
                  @error('nominal')
                        <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="bukti_transaksi" class="form-label">Bukti Transaksi</label>
                  <input name="bukti_transaksi" type="file" class="form-control-file" id="bukti_transaksi">
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <script>
        $('#tanggal_edit').datepicker({
            uiLibrary: 'bootstrap5',
            format: 'yyyy-mm-dd'
        });
      </script>

    <!-- Modal Add Transaction -->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahtransaksi" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalTambah">Add Transaction</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form method="post" action="cashflow" >
            @csrf
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label" for="tipe">Tipe</label>
                <select name="tipe" class="form-select @error('tipe') is-invalid @enderror" aria-label="Default select example">
                  <option value="0" selected>Choose..</option>
                  <option value="Pemasukan" {{ old('tipe') == 'Pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                  <option value="Pengeluaran" {{ old('tipe') == 'Pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
                </select>
                @error('tipe')
                      <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="tanggal">Tanggal</label>
                <input name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" placeholder="yyyy-mm-dd" id="tanggal" value="{{ old('tanggal') }}">
                @error('tanggal')
                      <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input name="kategori" type="input" class="form-control @error('kategori') is-invalid @enderror" id="kategori" placeholder="Makanan" value="{{ old('kategori') }}">
                @error('kategori')
                      <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                      <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="nominal" class="form-label">Nominal</label>
                <input name="nominal" type="input" class="form-control @error('nominal') is-invalid @enderror" id="nominal" placeholder="Rp. 0" value="{{ old('nominal') }}">
                @error('nominal')
                      <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="bukti_transaksi" class="form-label">Bukti Transaksi</label>
                <input name="bukti_transaksi" type="file" class="form-control-file" id="bukti_transaksi">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
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
    });
       
       // Edit Modal
    table.on('click', '.edit', function(){
      
      $tr = $(this).closest('tr');
      if ($($tr).hasClass('child')) {
        $tr = $tr.prev('.parent');
      }

      var data = table.row($tr).data();
      console.log(data);

      $('#tipe_edit').val(data[1]);
      $('#tanggal_edit').val(data[2]);
      $('#kategori_edit').val(data[3]);
      $('#deskripsi_edit').val(data[4]);
      $('#nominal_edit').val(data[5]);

      $('#form_edit').attr('action', '/cashflow/'+data[0]);
      $('#edit').modal('show');
    });

    table.buttons().container()
      .appendTo( '#table_wrapper .col-md-6:eq(0)' );
    });

    $(document).ready(function(){
      $('.alert-success').fadeIn().delay(5000).fadeOut();
    });

    // Hold Modal After Validation Error
    // @if (count($errors) > 0)
    //   $( document ).ready(function() {
    //   $('#edit').modal('show');
    //   });
    // @endif

    @if (count($errors) > 0)
      $( document ).ready(function() {
      $('#tambah').modal('show');
      });
    @endif
  </script>
@endsection