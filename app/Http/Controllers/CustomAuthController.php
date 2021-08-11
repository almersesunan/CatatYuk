<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
// use Sentinel;
// use Reminder;
// use Mail;

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
            'name' => 'required|alpha',
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $cashflow
     * @return \Illuminate\Http\Response
    */
    public function changePassword(Request $request, User $user)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);
        $current_password = auth()->user()->password;
        $user = User::where('id', Auth::user()->id);
        $old_password = request('old_password');

        if (Hash::check($old_password, $current_password)) {
            $user->update([
                'password' => bcrypt(request('password'))
            ]);
            return redirect('signout');
        } else{
            return back()->withErrors(['old_password' => 'Make sure your old password filled correctly!']);
        }
        

        
        //dd($user);
        //return redirect('login');
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
    

    
    // public function reset(){
    //     return view('auth.passwords.email');
    // }

    // public function password(Request $request){
    //     $user = User::where($request->email)->first();

    //     if ($user==null) {
    //         return redirect()->back()->withErrors(['email' => 'Email not exist!']);
    //     }

    //     $user = Sentinel::findById($user->id);
    //     $reminder = Reminder::exists($user) ? : Reminder::create($user);
    //     $this->sendEmail($user, $reminder->code);
    //     return redirect()->back()->with(['success' => 'Reset code sent to your email.']);
        
    // }

    // public function sendEmail($user, $code){
    //     Mail::send(
    //         'auth.passwords.forgotPassword',
    //         ['user' => $user, 'code' => $code],
    //         function($message) use ($user){
    //             $message->to($user->email);
    //             $message->subject("$user->name, reset your password");
    //         }
    //     );
    // }

}