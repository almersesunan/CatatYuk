@extends('layouts/main')

@section('title', 'CatatYuk - Profile')
    
@section('container')
<div class="container rounded bg-white mt-5 mb-5 profile">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">{{ Auth::user()->Name }}</span><span class="text-black-50">{{ Auth::user()->email }}</span><span> </span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form method="post" action="/profile/{{ Auth::user()->id }}">
                @method('patch')
                @csrf
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" placeholder="Name" value=""></div>
                    </div>
                    <div class="row mt-3">
                        {{-- <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="Email" value="{{ Auth::user()->email }}"></div> --}}
                        <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="Address" value="{{ Auth::user()->address }}"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">City</label><input type="text" class="form-control" placeholder="City" value="{{ Auth::user()->city }}"></div>
                        <div class="col-md-6"><label class="labels">Postal Code</label><input type="text" class="form-control" placeholder="Postal Code" value="{{ Auth::user()->postalcode }}"></div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection