@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('messages.auth.verify.title') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('messages.auth.verify.alert') }}
                        </div>
                    @endif

                    {{ __('messages.auth.verify.message1') }}
                    {{ __('messages.auth.verify.message2') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('messages.auth.verify.button') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
