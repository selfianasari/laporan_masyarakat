@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row-justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>
                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">{{ __('A new verivication link.') }}</div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verivication link.') }}
                    {{ __('If you did not receive the email.')}}
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}"></form>
                        @csrf
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{_('click here to request another') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection