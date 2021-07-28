<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }  
      

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            session()->flash('success');
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed In');
        }
  
        return redirect("login")->with('status', 'Login details are invalid!');
    }



    public function registration()
    {
        return view('auth.login');
    }
      

    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("dashboard")->with('status', 'You have signed-in');
    }


    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
    
    public function viewPassword()
    {
        return view('changePassword');
    }
    

    // public function dashboard()
    // {
    //     if(Auth::check()){
    //         return view('dashboard');
    //     }
  
    //     return redirect("login")->with('You are not allowed to access');
    // }
    

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }

    public function profile(){
        $user = User::where('id', Auth::user()->id)->get();
        return view('profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $cashflow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user){
        $request->validate([
            'name' => 'required'
            // 'email' => 'required|email|unique:users'
            // 'address' => '',
            // 'city' => '',
            // 'postalcode' => ''
        ]);
        $user = User::where('id', Auth::user()->id);
        $user->update([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'postalcode' => $request->postalcode
        ]);
        // $user->name = $request->name;
        // // $user->email = $request->email;
        // $user->address = $request->address;
        // $user->city = $request->city;
        // $user->postalcode = $request->postalcode;
        // $user->save();
        //session()->flash('user update sucessfully!')
        return redirect('profile')->with('status','Your profile has been updated!');
    }
    


}