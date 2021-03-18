@extends('templates.main')

@section('content')
<h1>Login</h1>
<br>
<br>

<div class="authform">
    <div class="authcard card">
        <div class="card-body">
            <form method="POST" action="{{ route('authenticate') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <!-- <button type="submit" class="btn btn-primary">Login</button> -->
                <div class="mb-5">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>

                    </div>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                    <a class="btn float-end forgot-pass" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
                <!-- <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                    </div>
                </div>
            </div> -->

                <!-- <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">

                </div>
            </div> -->


            </form>
        </div>
    </div>

</div>
@endsection