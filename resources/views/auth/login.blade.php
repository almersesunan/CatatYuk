@extends('layouts.app')

@section('content')
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form method="POST" action="{{ route('login.custom') }}" class="sign-in-form">
                    @csrf
                    <h2 class="title">Login</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" placeholder="Email" id="email" name="email" required/>
                        {{-- @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif --}}
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" id="password" name="password" required/>
                        {{-- @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif --}}
                    </div>
                    <input type="submit" value="Submit" class="btn solid" />
                    <br>
                    @if (session('status'))
                    <div class="alert alert-success" style="color: red;">
                        {{ session('status') }}
                    </div>
                     @endif
                </form>
                <form action="{{ route('register.custom') }}" class="sign-up-form" method="POST" id="register">
                    @csrf
                    <h2 class="title">Register</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" class="@error('name') is-invalid @enderror" placeholder="Full Name" id="name" name="name" required/>
                        {{-- @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif --}}
                        
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" class="@error('email') is-invalid @enderror" placeholder="Email" id="email_address" name="email" required />
                        {{-- @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif --}}
                        
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" class="@error('password') is-invalid @enderror" placeholder="Password" id="password" name="password" required />
                        {{-- @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif --}}
                        
                    </div>
                    <input type="submit" class="btn" value="Submit" />
                    <br>
                    {{-- @if (session('status'))
                    <div class="alert alert-success" style="color: red;">
                        {{ session('status') }}
                    </div>
                     @endif --}}
                    @error('name')
                        <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                    @enderror
                    @error('email')
                        <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                    @enderror
                    @error('password')
                        <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                    @enderror
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Don't have an account?</h3>
                    <p>
                        Let's register your account first!
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Register
                    </button>
                </div>
                <img src="img/log.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Already have one?</h3>
                    <br>
                    <button class="btn transparent" id="sign-in-btn">
                        Login
                    </button>
                </div>
                <img src="img/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="/js/appp.js"></script>
</body>

@endsection