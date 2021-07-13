@extends('layouts/main')

@section('title', 'CatatYuk - Lending')

@section('container')
  <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">   
          <div class="card-body">
            <h1 class="h2">Payable</h1>
            <table id="table" class="table table-striped table-bordered" style="width:100%">
              <a href="#" style="float: right">Download to PDF</a>
              <label for="pwd">Payable</label><br>
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Date</th>
                  <th>Due Date</th>
                  <th>Description</th>
                  <th>Amount</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($payable as $payable)
                <tr>
                  <td>{{$payable->py_id}}</td>
                  <td>{{$payable->py_name}}</td>
                  <td>{{$payable->py_date}}</td>
                  <td>{{$payable->due_date}}</td>
                  <td>{{$payable->description}}</td>
                  <td>{{$payable->py_amount}}</td>
                  <td align="center">  
                    {{-- <button class="btn btn-secondary edit"><i class="fa fa-edit"></i> Edit</button> --}}
                    <a href="/lending/payable/edit/{{ $payable->py_id }}" class="btn btn-secondary edit"><i class="fa fa-edit"></i>Edit</a> 
                    <form action="lending/payable/{{$payable->py_id}}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                      <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                     </form>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            
            <br><br><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">Add Payable</button>
            <br/><br/><br/><br/>
            <h1 class="h2">Receivable</h1>
            <table id="table1" class="table table-striped table-bordered" style="width:100%">
                <a href="#" style="float: right">Download to PDF</a>
                <label for="pwd">Receivable</label><br>
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Due Date</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($receivable as $receivable)
                    <tr>
                    <td>{{$receivable->rc_id}}</td>
                    <td>{{$receivable->rc_name}}</td>
                    <td>{{$receivable->rc_date}}</td>
                    <td>{{$receivable->rc_due_date}}</td>
                    <td>{{$receivable->rc_description}}</td>
                    <td>{{$receivable->rc_amount}}</td>
                    <td align="center">
                      <a href="/lending/receivable/edit/{{ $receivable->rc_id }}" class="btn btn-secondary edit1"><i class="fa fa-edit"></i>Edit</a> 
                      <form action="lending/receivable/{{$receivable->rc_id}}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                        <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            <br><br><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah1">Add Receivable</button>
          </div>
         
    

    <!-- Modal Edit Hutang -->
  <html>
    <head>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    </head>
    
    {{-- <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="edithutang" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalEditHutang">Edit Payable</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          

          <form id="form_edit" action="/lending/payable/update/{{ $payable->py_id }} " method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf 
          <div class="modal-body" id="modal-edit">
            <div class="mb-3">
              <label class="form-label" for="py_name_edit">Name</label>
              <input type="text" name="py_name_edit" class="form-control @error('py_name_edit') is-invalid @enderror" id="py_name_edit" value="{{ $payable->py_name }}">
              @if($errors->has('py_name_edit'))
                <div class="text-danger">
                    {{ $errors->first('py_name_edit')}}
                </div>
              @endif
            </div>
            <div class="mb-3">
              <label class="form-label" for="py_date_edit">Date</label>
              <input name="py_date_edit" class="form-control @error('py_date_edit') is-invalid @enderror" id="py_date_edit" value="{{ $payable->py_date }}">
              @if($errors->has('py_date_edit'))
                <div class="text-danger">
                    {{ $errors->first('py_date_edit')}}
                </div>
              @endif
            </div>
            <div class="mb-3">
              <label class="form-label" for="due_date_edit">Due Date</label>
              <input name="due_date_edit" class="form-control @error('due_date_edit') is-invalid @enderror" id="due_date_edit" value="{{ $payable->due_date }}">
              @if($errors->has('due_date_edit'))
                <div class="text-danger">
                    {{ $errors->first('due_date_edit')}}
                </div>
              @endif
            </div>
            <div class="mb-3">
              <label class="form-label" for="description_edit">Description</label>
              <textarea name="description_edit" class="form-control @error('description_edit') is-invalid @enderror" id="description_edit" rows="3">{{ $payable->description }}</textarea>
              @if($errors->has('description_edit'))
                <div class="text-danger">
                    {{ $errors->first('description_edit')}}
                </div>
              @endif
            </div>
            <div class="mb-3">
                <label class="form-label" for="py_amount_edit">Amount</label>
                <input type="text" name="py_amount_edit" class="form-control @error('py_amount_edit') is-invalid @enderror" id="py_amount_edit" value="{{ $payable->py_amount }}">
                @if($errors->has('py_amount_edit'))
                <div class="text-danger">
                    {{ $errors->first('py_amount_edit')}}
                </div>
              @endif
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
          </form>
        </div>
      </div>
    </div>
      <script>
        $('#py_date_edit').datepicker({
            uiLibrary: 'bootstrap5',
            format: 'yyyy-mm-dd'
        });
      </script>
      <script>
        $('#due_date_edit').datepicker({
            uiLibrary: 'bootstrap5',
            format: 'yyyy-mm-dd'
        });
      </script> --}}

    
    <!-- Modal Edit Piutang -->
    {{-- <div class="modal fade" id="edit1" tabindex="-1" aria-labelledby="editpiutang" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ModalEditPiutang">Edit Receivable</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form id="form_edit1" action="{{ route('receivable-update',$receivable)}}" method="POST" enctype="multipart/form-data">
              @method('put')
              @csrf 
              <div class="modal-body">
                <div class="mb-3">
                  <label class="form-label" for="rc_name_edit">Name</label>
                  <input name="rc_name_edit" class="form-control @error('rc_name_edit') is-invalid @enderror"  id="rc_name_edit" value="{{ old('rc_name_edit') }}">
                  @error('rc_name_edit')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label" for="rc_date_edit">Date</label>
                  <input type="text" name="rc_date_edit" class="form-control @error('rc_date_edit') is-invalid @enderror" id="rc_date_edit" value="{{ old('rc_date_edit') }}">
                  @error('rc_date_edit')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label" for="rc_due_date_edit">Due Date</label>
                  <input type="text" name="rc_due_date_edit" class="form-control @error('rc_due_date_edit') is-invalid @enderror" id="rc_due_date_edit" value="{{ old('rc_due_date_edit') }}">
                  @error('rc_due_date_edit')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label" for="rc_description_edit">Description</label>
                  <textarea class="form-control @error('rc_description_edit') is-invalid @enderror" name="rc_description_edit" id="rc_description_edit" rows="3">{{ old('rc_description_edit') }}</textarea>
                  @error('rc_description_edit')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="rc_amount_edit">Amount</label>
                    <input type="text" name="rc_amount_edit" class="form-control @error('rc_amount_edit') is-invalid @enderror" id="rc_amount_edit" value="{{ old('rc_amount_edit') }}">
                    @error('rc_amount_edit')
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
      <script>
        $('#rc_date_edit').datepicker({
            uiLibrary: 'bootstrap5',
            format: 'dd-mm-yyyy'
        });
      </script>
      <script>
        $('#rc_due_date_edit').datepicker({
            uiLibrary: 'bootstrap5',
            format: 'dd-mm-yyyy'
        });
      </script> --}}
    
    <!-- Modal Tambah Hutang -->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahhutang" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalTambahHutang">Add Payable</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <form method="post" action="lending/payable">
            @csrf
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label" for="py_name">Name</label>
                <input type="text" name="py_name" placeholder="Masukan Nama" class="form-control @error('py_name') is-invalid @enderror" id="py_name" value="{{ old('py_name') }}">
                @error('py_name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="py_date">Date</label>
                <input name="py_date" class="form-control @error('py_date') is-invalid @enderror" placeholder="yyyy-mm-dd" id="py_date" value="{{ old('py_date') }}">
                @error('py_date')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="due_date">Due Date</label>
                <input type="text" name="due_date" class="form-control @error('due_date') is-invalid @enderror" placeholder="yyyy-mm-dd" id="due_date" value="{{ old('due_date') }}">
                @error('due_date')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label" for="description">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Masukan keterangan" rows="3">{{ old('description') }}</textarea>
                @error('description')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                  <label class="form-label" for="py_amount">Amount</label>
                  <input type="text" name="py_amount" class="form-control @error('py_amount') is-invalid @enderror" data-type="currency" placeholder="Rp 0" id="py_amount" value="{{ old('py_amount') }}">
                  @error('py_amount')
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
                <h5 class="modal-title" id="ModalTambahPiutang">Add Receivable</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              
              <form method="post" action="lending/receivable">
                @csrf
              <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label" for="rc_name">Name</label>
                    <input type="text" name="rc_name" class="form-control @error('rc_name') is-invalid @enderror" placeholder="Masukan nama" id="rc_name" value="{{ old('rc_name') }}">
                    @error('rc_name')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="rc_date">Date</label>
                    <input name="rc_date" class="form-control @error('rc_date') is-invalid @enderror" placeholder="dd-mm-yyyy" id="rc_date" value="{{ old('rc_date') }}">
                    @error('rc_date')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="rc_due_date">Due Date</label>
                    <input type="text" name="rc_due_date" class="form-control @error('rc_due_date') is-invalid @enderror" placeholder="dd-mm-yyyy" id="rc_due_date" value="{{ old('rc_due_date') }}">
                    @error('rc_due_date')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="rc_description">Description</label>
                    <textarea class="form-control @error('rc_description') is-invalid @enderror" name="rc_description" id="description" placeholder="Masukan keterangan" rows="3">{{ old('rc_description') }}</textarea>
                    @error('rc_description')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-3">
                      <label class="form-label" for="rc_amount">Amount</label>
                      <input type="text" name="rc_amount" class="form-control @error('rc_amount') is-invalid @enderror" data-type="currency" placeholder="Rp 0" id="rc_amount" value="{{ old('rc_amount') }}">
                      @error('rc_amount')
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
        <script>
            $('#rc_date').datepicker({
                uiLibrary: 'bootstrap5',
                format: 'yyyy-mm-dd'
            });
        </script>
        <script>
          $('#rc_due_date').datepicker({
              uiLibrary: 'bootstrap5',
              format: 'yyyy-mm-dd'
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
    //auto input format currency using jquery
    $("input[data-type='currency']").on({
    keyup: function() {
    formatCurrency($(this));
    },
    blur: function() { 
    formatCurrency($(this), "blur");
    }
    });


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
  </script>

{{--   <script>
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

  </script> --}}
  
  {{-- Click Edit Hutang Button --}}
  <script>
    $(document).ready(function() {
      var table = $('#table').DataTable( {
      lengthChange: false
    } );

    // table.on('click', '.edit', function(){
      
    //   $tr = $(this).closest('tr');
    //   if ($($tr).hasClass('child')) {
    //     $tr = $tr.prev('.parent');
    //   }

    //   var data = table.row($tr).data();
    //   console.log(data);

    //   $('#py_name_edit').val(data[1]);
    //   $('#py_date_edit').val(data[2]);
    //   $('#due_date_edit').val(data[3]);
    //   $('#description_edit').val(data[4]);
    //   $('#py_amount_edit').val(data[5]);

    //   $('#form_edit').attr('action', '/lending/payable/update/'+data[0]);
    //   $('#edit').modal('show');
    // });
  
    table.buttons().container()
      .appendTo( '#table_wrapper .col-md-6:eq(0)' );
    } );
  </script>

  {{-- Click Edit Piutang Button --}}
  <script>
    $(document).ready(function() {
      var table = $('#table1').DataTable( {
      lengthChange: false
    } );

    // table.on('click', '.edit1', function(){
      
    //   $tr = $(this).closest('tr');
    //   if ($($tr).hasClass('child')) {
    //     $tr = $tr.prev('.parent');
    //   }

    //   var data = table.row($tr).data();
    //   console.log(data);

    //   $('#rc_name_edit').val(data[1]);
    //   $('#rc_date_edit').val(data[2]);
    //   $('#rc_due_date_edit').val(data[3]);
    //   $('#rc_description_edit').val(data[4]);
    //   $('#rc_amount_edit').val(data[5]);

    //   $('#form_edit1').attr('action', '/lending/receivable/update/'+data[0]);
    //   $('#edit1').modal('show');
    // });

    table.buttons().container()
      .appendTo( '#table_wrapper .col-md-6:eq(0)' );
    } );
  </script>

  {{-- Hold Edit Hutang Modal After Validation Error --}}
  {{-- @if ($errors->has('py_name_edit'))
    <script>
      $(document).ready(function() {
      $('#edit').modal('show');
    });
    </script>
  @endif

  @if ($errors->has('py_date_edit'))
    <script>
      $(document).ready(function() {
      $('#edit').modal('show');
    });
    </script>
  @endif

  @if ($errors->has('due_date_edit'))
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

  @if ($errors->has('py_amount_edit'))
    <script>
      $(document).ready(function() {
      $('#edit').modal('show');
    });
    </script>
  @endif --}}

  {{-- Hold Tambah Hutang Modal After Validation Error --}}

  @if ($errors->has('py_name'))
    <script>
      $( document ).ready(function() {
      $('#tambah').modal('show');
      });
    </script>
  @endif

  @if ($errors->has('py_date'))
    <script>
      $( document ).ready(function() {
      $('#tambah').modal('show');
      });
    </script>
  @endif

  @if ($errors->has('due_date'))
    <script>
      $( document ).ready(function() {
      $('#tambah').modal('show');
      });
    </script>
  @endif

  @if ($errors->has('description'))
    <script>
      $( document ).ready(function() {
      $('#tambah').modal('show');
      });
    </script>
  @endif

  @if ($errors->has('py_amount'))
    <script>
      $( document ).ready(function() {
      $('#tambah').modal('show');
      });
    </script>
  @endif

  {{-- Hold Tambah Piutang Modal After Validation Error --}}

  @if ($errors->has('rc_name'))
  <script>
    $( document ).ready(function() {
    $('#tambah1').modal('show');
    });
  </script>
@endif

@if ($errors->has('rc_date'))
  <script>
    $( document ).ready(function() {
    $('#tambah1').modal('show');
    });
  </script>
@endif

@if ($errors->has('rc_due_date'))
  <script>
    $( document ).ready(function() {
    $('#tambah1').modal('show');
    });
  </script>
@endif

@if ($errors->has('rc_description'))
  <script>
    $( document ).ready(function() {
    $('#tambah1').modal('show');
    });
  </script>
@endif

@if ($errors->has('rc_amount'))
  <script>
    $( document ).ready(function() {
    $('#tambah1').modal('show');
    });
  </script>
@endif

{{-- Hold Edit Piutang Modal After Validation Error --}}
{{-- @if ($errors->has('rc_name_edit'))
<script>
  $(document).ready(function() {
  $('#edit1').modal('show');
});
</script>
@endif

@if ($errors->has('rc_date_edit'))
<script>
  $(document).ready(function() {
  $('#edit1').modal('show');
});
</script>
@endif

@if ($errors->has('rc_due_date_edit'))
<script>
  $(document).ready(function() {
  $('#edit1').modal('show');
});
</script>
@endif

@if ($errors->has('rc_description_edit'))
<script>
  $(document).ready(function() {
  $('#edit1').modal('show');
});
</script>
@endif

@if ($errors->has('rc_amount_edit'))
<script>
  $(document).ready(function() {
  $('#edit1').modal('show');
});
</script>
@endif --}}
@endsection