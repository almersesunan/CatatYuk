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
        <label for="pwd">Item Stock</label><br>
        <thead>
            <tr align="center">
              <th>Id</th>
              <th>Item Name</th>
              <th>Minimum</th>
              <th>Available</th>
              <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stock as $stock)
            <tr>
              <td align="center">{{$stock->st_id}}</td>
              <td>{{$stock->item_name}}</td>
              <td align="center">{{$stock->minimum}}</td>
              <td align="center">{{$stock->available}}</td>
              <td align="center">
                <button class="btn btn-secondary edit"><i class="fa fa-edit"></i> Edit</button>
                <form action="stock/{{$stock->st_id}}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure want to delete this data?')"><i class="fa fa-trash"></i> Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      <br><br><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">Add Item</button>
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
              <label class="form-label" for="item_name_edit">Item Name</label>
              <input name="item_name_edit" class="form-control @error('item_name') is-invalid @enderror" id="item_name_edit">
              @error('item_name')
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
                <label class="form-label" for="available_edit">Available</label>
                <input name="available_edit" type="text" class="form-control @error('available') is-invalid @enderror" id="available_edit">
                @error('available')
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
                <input name="minimum" type="text" class="form-control @error('minimum') is-invalid @enderror" id="minimum" value="{{ old('minimum') }}" >
                @error('minimum')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="available">Available</label>
                <input name="available" type="text" class="form-control @error('available') is-invalid @enderror" id="available" value="{{ old('available') }}" >
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