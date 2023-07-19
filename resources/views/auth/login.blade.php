<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Provaltec') }}</title>
    @vite('resources/css/app.scss')
</head>

<body>
    <div class="flex flex-col items-center justify-center h-screen bg-back">
        <div class="">
            <img src="img/provaltec-negro.png" alt="Provaltec" title="Provaltec">
        </div>
        <form action="{{ route('login.admin') }}" method="POST">
            @csrf
            <div class="m-1">
                <input type="email" name="email"
                    class="my-5 p-1 w-full border shadow-sm border-slate-300 placeholder-slate-500 focus:outline-none focus:border-aside rounded-md block"
                    required placeholder="Email">
                @error('email')
                <span class="text-red-700">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="m-1">
                <input type="password" name="password"
                    class="my-5 p-1 w-full border shadow-sm border-slate-300 placeholder-slate-500 focus:outline-none focus:border-aside rounded-md block"
                    required placeholder="•••••••••">
                @error('password')
                <span class="text-red-700">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button class="text-center bg-action px-24 py-2 rounded-md text-white font-bold hover:bg-hover"
                type="submit">Ingresar</button>
        </form>
        @error('message')
        <span class="text-red-700">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</body>

</html>

{{-- @extends('layouts.app') --}}
{{--
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <p>hola</p>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                                }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password')
                                }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                        old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}