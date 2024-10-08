@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Delete Account') }}</div>
        <div class="card-body">
            <p>{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please dowload any data or information that you wish to retain before deleting your account.') }}</p>
            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('DELETE')
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-canger">{{ __('Delete Account') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection