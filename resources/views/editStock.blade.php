@extends('layouts/main')

@section('title', 'CatatYuk - Manage Stock')
    
@section('container')

<html>
    <head>
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
      <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />   
    </head>
        <div class="card-body">
            <h1 class="h2">Manage Stock</h1>
              <body>
                <div class="container">
                    <div class="card mt-5">
                        <div class="card-header text-center">
                            Edit Stock
                        </div>
                        <div class="card-body">
                        <br>
                            
                            <form method="post" action="/stock/{{ $stock->st_id }}">

                              @method('patch')
                              @csrf
                              <div class="mb-3">
                                <label class="form-label" for="item_name_edit">Item Name</label>
                                <input name="item_name_edit" class="form-control @error('item_name_edit') is-invalid @enderror" id="item_name_edit" value="{{ $stock->item_name }}">
                                @error('item_name_edit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>  
                              <div class="mb-3">
                                  <label class="form-label" for="minimum_edit">Minimum</label>
                                  <input name="minimum_edit" type="number" class="form-control @error('minimum_edit') is-invalid @enderror" id="minimum_edit" value="{{ $stock->minimum }}">
                                  @error('minimum_edit')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                              </div>
                              <div class="mb-3">
                                  <label class="form-label" for="available_edit">Available</label>
                                  <input name="available_edit" type="number" class="form-control @error('available_edit') is-invalid @enderror" id="available_edit" value="{{ $stock->available }}">
                                  @error('available_edit')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                              </div>
                                  <br>
                                <div class="row">
                                  <div class="col-10"></div>
                                  <div class="col-1">
                                    <a href="/stock" class="btn btn-secondary">Cancel</a>
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
@endsection


          
