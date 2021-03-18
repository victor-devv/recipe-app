@extends('templates.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    <form class="" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        Did not receive a verification link?
                        <button type="submit" class="btn btn-primary m-2">Resend</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
