@extends('layout.auth')

@section('content')
    <div class="auth-bg">
        <div class="auth-container">
            <div class="auth-form">
                <h1>Register</h1>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-element">
                        <p>Name</p>
                        <input id="name" type="text" class="@error('name') form-is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
                        @error('name')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-element">
                        <p>Email</p>
                        <input id="email" type="email" class="@error('email') form-is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                        @error('email')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-element">
                        <p>Phone No.</p>
                        <input id="phone" type="number" class="@error('phone') form-is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus />
                        @error('phone')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-element">
                        <p>Password</p>
                        <div class="password_require"></div>
                        <input id="password" type="password" class="@error('password') form-is-invalid @enderror" name="password" required autocomplete="current-password" />
                        @error('password')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-element">
                        <p>Confirm Password</p>
                        <input id="password_confirmation" type="password" class="@error('password_confirmation') form-is-invalid @enderror" name="password_confirmation" required autocomplete="current-password" />
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-element">
                        <button type="submit">Continue</button>
                    </div>

                    <p class="dont-have">Already have an account? <a href="{{ route('login') }}">login here</a></p>
                </form>
            </div>
        </div>
    </div>
@endsection


