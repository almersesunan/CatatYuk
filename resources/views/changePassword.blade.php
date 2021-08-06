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
                        <form method="post" action="/change-password/{{ Auth::user()->id }}">
                          @method('patch')
                          @csrf
                          <div class="mb-3">
                            <label class="form-label" for="old_password">Old Password</label>
                            <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="old_password"> 
                            @if($errors->has('old_password'))
                              <div class="text-danger">
                                  {{ $errors->first('old_password')}}
                              </div>
                            @endif
                            @if (session('error'))
                              <div class="alert alert-danger">
                                {{ session('error') }}
                              </div>
                            @endif
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="password">New Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                            @if($errors->has('password'))
                              <div class="text-danger">
                                  {{ $errors->first('password')}}
                              </div>
                            @endif
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation">
                            @if($errors->has('password_confirmation'))
                              <div class="text-danger">
                                  {{ $errors->first('password_confirmation')}}
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
                        </form>
                      </div>   
                    </div>
                  </div>
                </div>
              </body>
              <br><br>
        </div>
  </html>   
@endsection