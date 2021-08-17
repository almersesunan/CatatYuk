@extends('layouts/main')

@section('title', 'CatatYuk - Manage Stock')


@section('container')
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet"> 
    <!--css ini bikin ngerusak tampilan, gatau kenapa-->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}   
    <div class="card-body" style="width:100%">
      <a type="button" class="btn btn-sm btn-outline-secondary" href="/stock_pdf" target="_blank" style="float: right">Download to PDF</a><br>
      <h1 class="h2">Manage Stock</h1>
      @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
      @endif
      <div class="table-responsive">
      <table id="table" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr align="center">
              <th>No</th>
              <th>Item Name</th>
              <th>Minimum</th>
              <th>Available</th>
              <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stock as $stock)
            <tr>
              <td align="center">{{$loop->iteration}}</td>
              <td>{{$stock->item_name}}</td>
              <td align="center">{{$stock->minimum}}</td>
              <td align="center">{{$stock->available}}</td>
              <td align="center">
                <a href="/stock/{{ $stock->st_id }}" class="btn btn-secondary edit"><i class="fa fa-edit"></i>Edit</a> 
                <form action="stock/{{ $stock->st_id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure want to delete this data?')"><i class="fa fa-trash"></i> Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      </div>
      <br><br><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">Add Item</button>
    </div>
            


<!-- Modal Edit -->
  {{-- <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editbarang" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalEdit">Edit Stock</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form id="form_edit" method="post" action="{{ route('stock-update', $stock) }}" enctype="multipart/form-data">
          @method('patch')
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label" for="item_name_edit">Item Name</label>
              <input name="item_name_edit" class="form-control @error('item_name_edit') is-invalid @enderror" id="item_name_edit" value="{{ old('item_name_edit') }}">
              @error('item_name_edit')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="minimum_edit">Minimum</label>
                <input name="minimum_edit" type="text" class="form-control @error('minimum_edit') is-invalid @enderror" id="minimum_edit" value="{{ old('minimum_edit') }}">
                @error('minimum_edit')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="available_edit">Available</label>
                <input name="available_edit" type="text" class="form-control @error('available_edit') is-invalid @enderror" id="available_edit" value="{{ old('available_edit') }}">
                @error('available_edit')
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
  </div> --}}

  <!-- Modal Tambah -->
  <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahbarang" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalTambah">Add Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="stock" id="modal-form">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
                <label class="form-label" for="item_name">Item Name</label>
                <input name="item_name" class="form-control @error('item_name') is-invalid @enderror" id="item_name" value="{{ old('item_name') }}">
                @error('item_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="minimum">Minimum</label>
                <input name="minimum" type="number" class="form-control @error('minimum') is-invalid @enderror" id="minimum" value="{{ old('minimum') }}" >
                @error('minimum')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="available">Available</label>
                <input name="available" type="number" class="form-control @error('available') is-invalid @enderror" id="available" value="{{ old('available') }}" >
                @error('available')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Add</button>
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
              lengthChange: false
          } );
       
          function getwords(){
            textbox = document.getElementById('words');
            label = document.getElementById('label');
            label.innerHTML = textbox.value;
          }

          // Edit Modal Fetch Data
          table.on('click', '.edit', function(){
      
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
              $tr = $tr.prev('.parent');
            }
          
            var data = table.row($tr).data();
            console.log(data);
          
            $('#item_name_edit').val(data[1]);
            $('#minimum_edit').val(data[2]);
            $('#available_edit').val(data[3]);
          
            $('#form_edit').attr('action', '/stock/'+data[0]);
            $('#edit').modal('show');
          });


          table.buttons().container()
              .appendTo( '#table_wrapper .col-md-6:eq(0)' );
          } );

          </script>

          {{-- Hold Modal After Validation Error --}}
          @if ($errors->has('item_name_edit'))
          <script>
            $(document).ready(function() {
              $('#edit').modal('show');
            });
          </script>
          @endif
          @if ($errors->has('minimum_edit'))
          <script>
            $(document).ready(function() {
              $('#edit').modal('show');
            });
          </script>
          @endif
          @if ($errors->has('available_edit'))
          <script>
            $(document).ready(function() {
              $('#edit').modal('show');
            });
          </script>
          @endif
          @if ($errors->has('item_name'))
          <script>
            $(document).ready(function() {
              $('#tambah').modal('show');
            });
          </script>
          @endif
          @if ($errors->has('minimum'))
          <script>
            $(document).ready(function() {
              $('#tambah').modal('show');
            });
          </script>
          @endif
          @if ($errors->has('available'))
          <script>
            $(document).ready(function() {
              $('#tambah').modal('show');
            });
          </script>
          @endif
          @endsection