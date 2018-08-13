@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
    <h1>WELCOME!</h1>
    <p><a class="btn btn-primary btn-lg" role="button" href="{{ route('login') }}">{{ __('Login') }}</a>
        <a class="btn btn-success btn-lg" role="button" href="{{ route('register') }}">{{ __('Register') }}</a>
    </p>
    </div>
@endsection
