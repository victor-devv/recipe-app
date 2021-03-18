@extends('templates.main')

@section('content')
<h1>{{ __('Reset Password') }}</h1>
<br>
<br>

<div class="container">
    <div class="card authform">

        <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}" class="p-5 pt-1 pb-1">
                @csrf

                <input type="hidden" name="token" value="{{ request()->route('token') }}">

                <div class="mb-2">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $request->email }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" autofocus>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="mb-2 mt-3">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Reset Password') }}
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection