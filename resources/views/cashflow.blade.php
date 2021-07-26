@extends('layouts/main')

@section('title', 'CatatYuk - Cashflow')

@section('container')
  <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <div class="card-body">
      <a type="button" class="btn btn-sm btn-outline-secondary" href="/cashflow_pdf" target="_blank" style="float: right">Download to PDF</a><br>
      <h1 class="h2">Cashflow</h1>
      @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
      @endif
      <table id="table" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr align=center>
            <th>No</th>
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
              <td align=center>{{$loop->iteration}}</td>
              <td>{{$cashflow->type}}</td>
              <td align=center>{{$cashflow->tr_date}}</td>
              <td>{{$cashflow->category}}</td>
              <td>{{$cashflow->description}}</td>
              <td align=right>{{$cashflow->tr_amount}}</td>
              <td>{{$cashflow->invoice}}</td>
              <td align=center>
                <a href="/cashflow/{{ $cashflow->tr_id }}" class="btn btn-secondary edit"><i class="fa fa-edit"></i>Edit</a> 
                <form action="cashflow/{{ $cashflow->tr_id }}" method="POST" class="d-inline">
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

    {{-- <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="edittransaksi" aria-hidden="true">
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
      </script> --}}

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
                <input name="tr_amount" type="input" class="form-control @error('tr_amount') is-invalid @enderror" id="tr_amount" data-type='currency' placeholder="Rp 0.00" value="{{ old('tr_amount') }}">
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
{{--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>
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

/*   $("input[data-type='currency']").mask("#,##0.00", {reverse: true});
 */


    //auto input format currency using jquery
    // $("input[data-type='currency']").on({
    // keyup: function() {
    // formatCurrency($(this));
    // },
    // blur: function() { 
    // formatCurrency($(this), "blur");
    // }
    // });


    function formatNumber(n) {
    // format number 1000000 to 1,234,567
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    }


    function formatCurrency(input, blur) {
    // appends $ to value, validates decimal side
    // and puts cursor back in right position.

    // get input value
    var input_val = input.val();

    // don't validate empty input
    if (input_val === "") { return; }

    // original length
    var original_len = input_val.length;

    // initial caret position 
    var caret_pos = input.prop("selectionStart");

    // check for decimal
    if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);

    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
    right_side += "00";
    }

    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = "Rp " + left_side + "." + right_side;

    } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = "Rp " + input_val;

    // final formatting
    if (blur === "blur") {
    input_val += ".00";
      }
    }
    // send updated string to input
    input.val(input_val);

    // put caret back in the right position
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
    }
 

/* 
    //Auto input format curency IDR using javascript
    document.querySelectorAll('input[type-currency="IDR"]').forEach((element) => {
    element.addEventListener('keyup', function(e) {
    let cursorPostion = this.selectionStart;
    let value = parseInt(this.value.replace(/[^,\d]/g, ''));
    let originalLenght = this.value.length;
    if (isNaN(value)) {
      this.value = "";
    } else {    
      this.value = value.toLocaleString('id-ID', {
        currency: 'IDR',
        style: 'currency',
        minimumFractionDigits: 0
      });
      cursorPostion = this.value.length - originalLenght + cursorPostion;
      this.setSelectionRange(cursorPostion, cursorPostion);
        }
      });
    });
 */


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