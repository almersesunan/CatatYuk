@extends('layouts/main')

@section('title', 'CatatYuk - Password')
    
@section('container')

<html>
    <head>
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
      <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />   
    </head>
        <div class="card-body">
            <h1 class="h2">Change Password</h1>
              <body>
                <div class="container">
                    <div class="card mt-5" style="width: 500px; margin: auto">
                        <div class="card-header text-center">Change Password
                        </div>
                        <div class="card-body">
                        <br>
                        {{-- <form method="post" action="/change-password/{{ Auth::user()->id }}"> --}}
                          @method('patch')
                          @csrf
                          <div class="mb-3">
                            <label class="form-label" for="new_password">New Password</label>
                            <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password">
                            @if($errors->has('new_password'))
                              <div class="text-danger">
                                  {{ $errors->first('new_password')}}
                              </div>
                            @endif
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="confirm_password">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password">
                            @if($errors->has('confirm_password'))
                              <div class="text-danger">
                                  {{ $errors->first('confirm_password')}}
                              </div>
                            @endif
                          <br>
                          <div class="row">
                            <div class="col-8"></div>
                            <div class="col-2">
                              <a href="/dashboard" class="btn btn-secondary">Cancel</a>
                            </div>
                            <div class="col-1">
                              <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                          </div>
                        {{-- </form> --}}
                      </div>   
                    </div>
                  </div>
                </div>
              </body>
              <br><br>
        </div>
  </html>   
@endsection