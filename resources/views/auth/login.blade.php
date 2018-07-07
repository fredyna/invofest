@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="background-color: #0259b7; color: #FFF; box-shadow: 5px 5px 7px rgba(0, 0, 0, 0.2);">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 text-left">
                            <img src="{{ url('img/logo/invofest_logo_light.png') }}" alt="Logo Invofest 2018" style="width:40px;"> <span style="font-size:18px;">
                        </div>
                        <div class="col-6 text-right" style="padding-top:2%;">
                            <span class="pull-right">Halaman Masuk</span>
                        </div>
                    </div>
                </div>

                <div class="card-body" style="background-color: #FFF; color:#000;">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Ketikan E-mail">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Ketikan Password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ingat Saya
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Masuk
                                </button>
                            </div>
                        </div>
                        
                            
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Lupa Password ?
                                </a>
                            </div>
                            <div class="col-md-6 text-center">
                                <a class="btn btn-link" href="{{ route('auth.activate.resend') }}">
                                        Kirim Ulang Aktivasi Email
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
