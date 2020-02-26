@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-4 offset-md-4 center-text">
      <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-input-margins">
          <label for="email">{{ __('E-Mail Address') }}</label>

          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-input-margins">
          <label for="password" class="">{{ __('Password') }}</label>

          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-input-margins">
          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

          <label class="form-check-label" for="remember" style="margin-right: 2em">
            {{ __('Remember Me') }}
          </label>

          <button type="submit" class="btn btn-primary">
            {{ __('Login') }}
          </button>
        </div>

        <div>
          @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
          </a>
          @endif
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
