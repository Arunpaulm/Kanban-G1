@extends('layout.auth')

@section('content')

    <div class="auth-bg">
        <div class="auth-container">
            <div class="auth-form">
                <h1>Sign in to your account</h1>
                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="form-element">
                        <label for="email"><p>Email</p></label>
                        <input id="email" type="email" class="@error('email') form-is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                        @error('email')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-element">
                        <label for="password"><p>Password</p></label>
                        <input id="password" type="password" class="@error('password') form-is-invalid @enderror" name="password" required autocomplete="current-password"/>
                        @error('password')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-element">
                        <div class="icheck-primary" id="myCheck">
                            <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember" class="remember_label">
                                Remember Me
                            </label>
                        </div>
                    </div>

                    <div class="form-element">
                        <button type="submit">Login</button>
                    </div>

                    <p class="dont-have">Don't have an account? <a href="{{ route('register') }}">register here</a></p>
                </form>
            </div>
        </div>
    </div>
@endsection
