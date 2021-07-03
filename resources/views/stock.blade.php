@extends('layouts/main')

@section('title', 'CatatYuk - Manage Stock')


@section('container')
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet"> 
    <!--css ini bikin ngerusak tampilan, gatau kenapa-->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}   
    <div class="card-body">
      <h1 class="h2">Manage Stock</h1>
      @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
      @endif
      <table id="table" class="table table-striped table-bordered" style="width:100%">
        <a href="#" style="float: right">Download to PDF</a>
        <label for="pwd">Stok Barang</label><br>
        <thead>
            <tr>
              <th>Id</th>
              <th>Nama Barang</th>
              <th>Minimum</th>
              <th>Jumlah Saat Ini</th>
              <th>Atur Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stock as $stock)
            <tr>
              <td>{{$stock->id}}</td>
              <td>{{$stock->nama_barang}}</td>
              <td>{{$stock->minimum}}</td>
              <td>{{$stock->jumlah_saat_ini}}</td>
              <td align="center">
                <button class="btn btn-secondary edit"><i class="fa fa-edit"></i> Edit</button>
                <form action="stock/{{$stock->id}}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure want to delete this data?')"><i class="fa fa-trash"></i> Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      <br><br><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">Add Stock</button>
    </div>
            


<!-- Modal Edit -->
  <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editbarang" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalEdit">Edit Stock</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form id="form_edit" method="post" action="stock" enctype="multipart/form-data">
          @method('patch')
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label" for="nama_barang_edit">Nama Barang</label>
              <input name="nama_barang_edit" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang_edit">
              @error('nama_barang')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="minimum_edit">Minimum</label>
                <input name="minimum_edit" type="text" class="form-control @error('minimum') is-invalid @enderror" id="minimum_edit">
                @error('minimum')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="jumlah_saat_ini_edit">Jumlah Saat Ini</label>
                <input name="jumlah_saat_ini_edit" type="text" class="form-control @error('jumlah_saat_ini') is-invalid @enderror" id="jumlah_saat_ini_edit">
                @error('jumlah_saat_ini')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <!-- Modal Tambah -->
  <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahbarang" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalTambah">Tambah Barang</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="stock" id="modal-form">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
                <label class="form-label" for="nama_barang">Nama Barang</label>
                <input name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" value="{{ old('nama_barang') }}">
                @error('nama_barang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="minimum">Minimum</label>
                <input name="minimum" type="text" class="form-control @error('minimum') is-invalid @enderror" id="minimum" value="{{ old('minimum') }}" >
                @error('minimum')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="jumlah_saat_ini">Jumlah Saat Ini</label>
                <input name="jumlah_saat_ini" type="text" class="form-control @error('jumlah_saat_ini') is-invalid @enderror" id="jumlah_saat_ini" value="{{ old('jumlah_saat_ini') }}" >
                @error('jumlah_saat_ini')
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
              lengthChange: false,
              buttons: ['pdf']
          } );
       
          // Edit Modal Fetch Data
          table.on('click', '.edit', function(){
      
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
              $tr = $tr.prev('.parent');
            }
          
            var data = table.row($tr).data();
            console.log(data);
          
            $('#nama_barang_edit').val(data[1]);
            $('#minimum_edit').val(data[2]);
            $('#jumlah_saat_ini_edit').val(data[3]);
          
            $('#form_edit').attr('action', '/stock/'+data[0]);
            $('#edit').modal('show');
          });


          table.buttons().container()
              .appendTo( '#table_wrapper .col-md-6:eq(0)' );
          } );

          // Success Flash FadeOut
          $(document).ready(function(){
            $('.alert-success').fadeIn().delay(5000).fadeOut();
          });
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