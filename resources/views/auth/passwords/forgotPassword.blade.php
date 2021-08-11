<h1>Hello {{ $user->name }}</h1>
<p>
    Please click button below to reset your password.
    <a type="button" href="{{ url('reset-password/'.$user->email.'/'.$code) }}">Reset Password</a>
</p>