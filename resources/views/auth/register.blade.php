@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4 center-text">
      <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-input-margins">
          <label for="email">{{ __('E-Mail Address') }}</label>

          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-input-margins">
          <label for="password">{{ __('Password') }}</label>

          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-input-margins">
          <label for="password-confirm">{{ __('Confirm Password') }}</label>

          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>

        <div>
          <button type="submit" class="btn btn-primary">
            {{ __('Register') }}
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
