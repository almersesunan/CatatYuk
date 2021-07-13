@extends('layouts/main')

@section('title', 'CatatYuk - Lending')
    
@section('container')

<html>
    <head>
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
      <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />   
    </head>
        <div class="card-body">
            <h1 class="h2">Payable</h1>
              <body>
                <div class="container">
                    <div class="card mt-5">
                        <div class="card-header text-center">
                            Edit Payable
                        </div>
                        <div class="card-body">
                        <br>
                            
                            <form method="post" action="/lending/payable/update/{{ $payable->py_id }}">

                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

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
                                  <br>
                                <div class="row">
                                  <div class="col-10"></div>
                                  <div class="col-1">
                                    <a href="/lending" class="btn btn-primary">Cancel</a>
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
  </script>
@endsection


          
