@extends('layouts/main')

@section('title', 'CatatYuk - Cashflow')
    
@section('container')

<html>
    <head>
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
      <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />   
    </head>
        <div class="card-body">
            <h1 class="h2">Cashflow</h1>
              <body>
                <div class="container">
                    <div class="card mt-5">
                        <div class="card-header text-center">
                            Edit Cashflow
                        </div>
                        <div class="card-body">
                        <br>
                            
                            <form method="post" action="/cashflow/{{ $cashflow->tr_id }}">

                              @method('patch')
                              @csrf

                                <div class="mb-3">
                                  <label class="form-label" for="type_edit">Transaction Type</label>
                                  <select name="type_edit" class="form-select @error('type_edit') is-invalid @enderror" id="type_edit" aria-label="Default select example">
                                    <option value="0"selected>Choose..</option>
                                    <option value="Income" {{ $cashflow->type == 'Income' ? 'selected' : '' }}>Income</option>
                                    <option value="Expense" {{ $cashflow->type == 'Expense' ? 'selected' : '' }}>Expense</option>
                                  </select>
                                  @error('type_edit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="tr_date_edit">Transaction Date</label>
                                  <input name="tr_date_edit" class="form-control @error('tr_date_edit') is-invalid @enderror" placeholder="yyyy-mm-dd" id="tr_date_edit" value="{{ $cashflow->tr_date }}">
                                  @error('tr_date_edit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                  <label for="category_edit" class="form-label">Category</label>
                                  <input name="category_edit" type="input" class="form-control @error('category_edit') is-invalid @enderror" id="category_edit" placeholder="Makanan" value="{{ $cashflow->category }}">
                                  @error('category_edit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                  <label for="description_edit" class="form-label">Description</label>
                                  <textarea name="description_edit" class="form-control @error('description_edit') is-invalid @enderror" id="description_edit" rows="3">{{ $cashflow->description }}</textarea>
                                  @error('description_edit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                  <label for="tr_amount_edit" class="form-label">Amount</label>
                                  <input name="tr_amount_edit" type="input" class="form-control @error('tr_amount_edit') is-invalid @enderror" id="tr_amount_edit" placeholder="Rp. 0" value="{{ $cashflow->tr_amount }}">
                                  @error('tr_amount_edit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                  <label for="invoice" class="form-label">Invoice</label>
                                  <input name="invoice" type="file" class="form-control-file" id="invoice">
                                </div>
                                  <br>
                                <div class="row">
                                  <div class="col-10"></div>
                                  <div class="col-1">
                                    <a href="/cashflow" class="btn btn-secondary">Cancel</a>
                                  </div>
                                  <div class="col-1">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                  </div>
                                </div>   
                            </form>
                        </div>
                    </div>
                </div>
              </body>
              <br><br>
        </div>
  </html>   

  <script>
    $('#tr_date_edit').datepicker({
        uiLibrary: 'bootstrap5',
        format: 'yyyy-mm-dd'
    });
  </script>
@endsection


          
