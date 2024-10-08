@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Update Password') }}</div>
        <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="current_password">{{ __('Current Password')}}</label>
                    <input id="current_password" type="password" class="form-control" name="current_password" required>
                </div>
                <div class="form-group mt-3">
                    <label for="password">{{ __('New Password')}}</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>
                <div class="form-group mt-3">
                    <label for="password_confirmation">{{ __('Confirm New Password')}}</label>
                    <input id="password_confirmation" type="password_confirmation" class="form-control" name="password_confirmation" required>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-canger">{{ __('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection