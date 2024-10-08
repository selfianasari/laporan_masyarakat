@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row-justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <label for="email">{{ __('Email Address')}}</label>
                            <input id="name" type="text" class="form-control" name="name" required autofocus>
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">{{ __('Password')}}</label>
                            <input id="password" type="password" class="form-control" name="password" required> 
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">{{ __('Confirm Password')}}</label>
                            <input id="password" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">{{ __('Reset Password')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection