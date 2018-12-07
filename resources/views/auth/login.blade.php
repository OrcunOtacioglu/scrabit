@extends('layouts.auth')

@section('title', 'Login')

@section('form-area')
    <form method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="email">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control" name="email" tabindex="1" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>

        <div class="form-group">
            <div class="d-block">
                <label for="password" class="control-label">{{ __('Password') }}</label>
                @if (Route::has('password.request'))
                    <div class="float-right">
                        <a href="{{ route('password.request') }}" class="text-small">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                @endif
            </div>
            <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
            @if ($errors->has('password'))
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>
            @endif
        </div>

        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                {{ __('Login') }}
            </button>
        </div>
    </form>
@endsection
