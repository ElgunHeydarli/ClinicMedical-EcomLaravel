@extends('auth.layouts.app')

@section('content')
<h3 class="text-white">Hesaba Daxil OL</h3>
<form method="POST" action="{{ route('login') }}">
  @csrf
  <div class="form-group">
    <label class="sr-only" for="inputName">{{ __('E-Mail Address') }}</label>
    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="form-group">
    <label class="sr-only" for="inputPassword">{{ __('Password') }}</label>
    <input id="password" type="password" placeholder="Şifrə" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

  <button type="submit" class="btn btn-primary btn-block"> {{ __('Daxil Ol') }}</button>
</form>
@endsection