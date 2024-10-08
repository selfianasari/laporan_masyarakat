@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Update Profil Information') }}</div>
        <div class="card-body">
            <form method="POST" action="{{ route('profil.update') }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">{{ __('Name')}}</label>
                    <input id="name" type="text" value="{{ old('name', auth()->user()->name) }}" required autofocus>
                </div>
                <div class="form-group mt-3">
                    <label for="email">{{ __('Email Address')}}</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email', auth()->user()->email)}}" required>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-canger">{{ __('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection