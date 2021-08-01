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
            <h1 class="h2">Receivable</h1>
              <body>
                <div class="container">
                    <div class="card mt-5">
                        <div class="card-header text-center">
                            Edit Receivable
                        </div>
                        <div class="card-body">
                        <br>
                            
                            <form method="post" action="/lending/receivable/update/{{ $receivable->rc_id }}">

                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <div class="mb-3">
                                    <label class="form-label" for="rc_name_edit">Name</label>
                                    <input type="text" name="rc_name_edit" class="form-control @error('rc_name_edit') is-invalid @enderror" id="rc_name_edit" value="{{ $receivable->rc_name }}">
                                    @if($errors->has('rc_name_edit'))
                                      <div class="text-danger">
                                          {{ $errors->first('rc_name_edit')}}
                                      </div>
                                    @endif
                                </div>
                                  <div class="mb-3">
                                    <label class="form-label" for="rc_date_edit">Date</label>
                                    <input name="rc_date_edit" class="form-control @error('rc_date_edit') is-invalid @enderror" id="rc_date_edit" value="{{ $receivable->rc_date }}">
                                    @if($errors->has('rc_date_edit'))
                                      <div class="text-danger">
                                          {{ $errors->first('rc_date_edit')}}
                                      </div>
                                    @endif
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label" for="rc_due_date_edit">Due Date</label>
                                    <input name="rc_due_date_edit" class="form-control @error('rc_due_date_edit') is-invalid @enderror" id="rc_due_date_edit" value="{{ $receivable->rc_due_date }}">
                                    @if($errors->has('rc_due_date_edit'))
                                      <div class="text-danger">
                                          {{ $errors->first('rc_due_date_edit')}}
                                      </div>
                                    @endif
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label" for="rc_description_edit">Description</label>
                                    <textarea name="rc_description_edit" class="form-control @error('rc_description_edit') is-invalid @enderror" id="rc_description_edit" rows="3">{{ $receivable->rc_description }}</textarea>
                                    @if($errors->has('rc_description_edit'))
                                      <div class="text-danger">
                                          {{ $errors->first('rc_description_edit')}}
                                      </div>
                                    @endif
                                  </div>
                                  <div class="mb-3">
                                      <label class="form-label" for="rc_amount_edit">Amount</label>
                                      <input type="text" name="rc_amount_edit" class="form-control @error('rc_amount_edit') is-invalid @enderror" id="rc_amount_edit" value="{{ $receivable->rc_amount }}">
                                      @if($errors->has('rc_amount_edit'))
                                      <div class="text-danger">
                                          {{ $errors->first('rc_amount_edit')}}
                                      </div>
                                    @endif
                                    </div>
                                  <br>
                                <div class="row">
                                  <div class="col-10"></div>
                                  <div class="col-1">
                                    <a href="/lending" class="btn btn-secondary">Cancel</a>
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
    $('#rc_date_edit').datepicker({
        uiLibrary: 'bootstrap5',
        format: 'yyyy-mm-dd'
    });
  </script>
  <script>
    $('#rc_due_date_edit').datepicker({
        uiLibrary: 'bootstrap5',
        format: 'yyyy-mm-dd'
    });
  </script>
@endsection