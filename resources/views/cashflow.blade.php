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
            <th>Transaction Type</th>
            <th>Transaction Date</th>
            <th>Category</th>
            <th>Description</th>
            <th>Amount</th>
            <th>Invoice</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($cashflow as $cashflow)
            <tr>
              <td align=center>{{$cashflow->tr_id}}</td>
              <td>{{$cashflow->type}}</td>
              <td align=center>{{$cashflow->tr_date}}</td>
              <td>{{$cashflow->category}}</td>
              <td>{{$cashflow->description}}</td>
              <td align=right>{{$cashflow->tr_amount}}</td>
              <td>{{$cashflow->invoice}}</td>
              <td align=center>
                <button class="btn btn-secondary edit"><i class="fa fa-edit"></i> Edit</button>
                <form action="cashflow/{{$cashflow->tr_id}}" method="POST" class="d-inline">
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
            <form id="form_edit" method="post" action="{{ route('cashflow-update', $cashflow) }}" enctype="multipart/form-data">
              @method('patch')
              @csrf
              <div class="modal-body" id="modal-edit">
                <div class="mb-3">
                  <label class="form-label" for="type_edit">Transaction Type</label>
                  <select name="type_edit" class="form-select @error('type_edit') is-invalid @enderror" id="type_edit" aria-label="Default select example">
                    <option value="0"selected>Choose..</option>
                    <option value="Income" {{ old('type_edit') == 'Income' ? 'selected' : '' }}>Income</option>
                    <option value="Expense" {{ old('type_edit') == 'Expense' ? 'selected' : '' }}>Expense</option>
                  </select>
                  @error('type_edit')
                        <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label" for="tr_date_edit">Transaction Date</label>
                  <input name="tr_date_edit" class="form-control @error('tr_date_edit') is-invalid @enderror" placeholder="yyyy-mm-dd" id="tr_date_edit" value="{{ old('tr_date_edit') }}">
                  @error('tr_date_edit')
                        <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="category_edit" class="form-label">Category</label>
                  <input name="category_edit" type="input" class="form-control @error('category_edit') is-invalid @enderror" id="category_edit" placeholder="Makanan" value="{{ old('category_edit') }}">
                  @error('category_edit')
                        <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="description_edit" class="form-label">Description</label>
                  <textarea name="description_edit" class="form-control @error('description_edit') is-invalid @enderror" id="description_edit" rows="3">{{ old('description_edit') }}</textarea>
                  @error('description_edit')
                        <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="tr_amount_edit" class="form-label">Amount</label>
                  <input name="tr_amount_edit" type="input" class="form-control @error('tr_amount_edit') is-invalid @enderror" id="tr_amount_edit" placeholder="Rp. 0" value="{{ old('tr_amount_edit') }}">
                  @error('tr_amount_edit')
                        <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="invoice" class="form-label">Invoice</label>
                  <input name="invoice" type="file" class="form-control-file" id="invoice">
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
        $('#tr_date_edit').datepicker({
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
                <label class="form-label" for="type">Transaction Type</label>
                <select name="type" class="form-select @error('type') is-invalid @enderror" aria-label="Default select example">
                  <option value="0" selected>Choose..</option>
                  <option value="Income" {{ old('type') == 'Income' ? 'selected' : '' }}>Income</option>
                  <option value="Expense" {{ old('type') == 'Expense' ? 'selected' : '' }}>Expense</option>
                </select>
                @error('type')
                      <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="tr_date">Transaction Date</label>
                <input name="tr_date" class="form-control @error('tr_date') is-invalid @enderror" placeholder="yyyy-mm-dd" id="tr_date" value="{{ old('tr_date') }}">
                @error('tr_date')
                      <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input name="category" type="input" class="form-control @error('category') is-invalid @enderror" id="category" placeholder="Makanan" value="{{ old('category') }}">
                @error('category')
                      <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3">{{ old('description') }}</textarea>
                @error('description')
                      <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="tr_amount" class="form-label">Amount</label>
                <input name="tr_amount" type="input" class="form-control @error('tr_amount') is-invalid @enderror" id="tr_amount" placeholder="Rp. 0" value="{{ old('tr_amount') }}">
                @error('tr_amount')
                      <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="invoice" class="form-label">Invoice</label>
                <input name="invoice" type="file" class="form-control-file" id="invoice">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script>
      $('#tr_date').datepicker({
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

      $('#type_edit').val(data[1]);
      $('#tr_date_edit').val(data[2]);
      $('#category_edit').val(data[3]);
      $('#description_edit').val(data[4]);
      $('#tr_amount_edit').val(data[5]);

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
  </script>

  {{-- Hold Modal After Validation Error --}}
  @if ($errors->has('type_edit'))
  <script>
    $(document).ready(function() {
      $('#edit').modal('show');
    });
  </script>
  @endif
  @if ($errors->has('tr_date_edit'))
  <script>
    $(document).ready(function() {
      $('#edit').modal('show');
    });
  </script>
  @endif
  @if ($errors->has('category_edit'))
  <script>
    $(document).ready(function() {
      $('#edit').modal('show');
    });
  </script>
  @endif
  @if ($errors->has('description_edit'))
  <script>
    $(document).ready(function() {
      $('#edit').modal('show');
    });
  </script>
  @endif
  @if ($errors->has('tr_amount_edit'))
  <script>
    $(document).ready(function() {
      $('#edit').modal('show');
    });
  </script>
  @endif
  @if ($errors->has('type'))
  <script>
    $(document).ready(function() {
      $('#tambah').modal('show');
    });
  </script>
  @endif
  @if ($errors->has('tr_date'))
  <script>
    $(document).ready(function() {
      $('#tambah').modal('show');
    });
  </script>
  @endif
  @if ($errors->has('category'))
  <script>
    $(document).ready(function() {
      $('#tambah').modal('show');
    });
  </script>
  @endif
  @if ($errors->has('description'))
  <script>
    $(document).ready(function() {
      $('#tambah').modal('show');
    });
  </script>
  @endif
  @if ($errors->has('tr_amount'))
  <script>
    $(document).ready(function() {
      $('#tambah').modal('show');
    });
  </script>
  @endif
@endsection