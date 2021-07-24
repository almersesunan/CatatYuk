@extends('layouts/main')

@section('title', 'CatatYuk - Profile')
    
@section('container')
<div class="container rounded bg-white mt-5 mb-5 profile">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Nama user</span><span class="text-black-50">"Email user"</span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control" placeholder="Nama depan" value=""></div>
                    <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" value="" placeholder="Nama belakang"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Phone Number</label><input type="text" class="form-control" placeholder="Masukan nomor handphone" value=""></div>
                    <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="Masukan Email" value=""></div>
                    <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="Masukan alamat rumah" value=""></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">City</label><input type="text" class="form-control" value="" placeholder="Masukan kota"></div>
                    <div class="col-md-6"><label class="labels">Postal Code</label><input type="text" class="form-control" placeholder="Masukan kode pos" value=""></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection