@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row-justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="card">
                <div class="card-header">{{ __('Forgot Password') }}</div>
                <div class="card-body">{{ __('Enter your email address and will send you password reset link.')}}
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">{{ __('Email.Address')}}</label>
                            <input id="email" type="email" class="form-control" name="email" required autofocus>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">{{ __('Send Password Reset Link')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection