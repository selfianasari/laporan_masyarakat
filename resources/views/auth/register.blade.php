@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row-justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">{{ __('Name')}}</label>
                            <input id="name" type="text" class="form-control" name="name" required autofocus>
                        </div>
                        <div class="form-group mt-3">
                            <label for="email">{{ __('Email')}}</label>
                            <input id="email" type="email" class="form-control" name="email" required> 
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">{{ __('Password')}}</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">{{ __('Register')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection