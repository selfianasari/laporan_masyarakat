@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row-justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="card">
                <div class="card-header">{{ __('Confirm Password') }}</div>
                <div class="card-body">{{ __('Please confirm your password before continuing.')}}
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
                        <div class="form-group">
                            <label for="password">{{ __('Password')}}</label>
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">{{ __('Confirm Password')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection