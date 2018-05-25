@extends('inspinia::layouts.auth')

@section('content')
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
            <h1 class="form-group ">
                <img src="img/logo-2.svg" width="50%" alt="">
            </h1>
        </div>
      <h3 style="font-family: BloggerSans-Medium;font-size: 16px;color: #6B6E70;">Welcome to Zonetelecom Admin</h3>


      <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
       {{ csrf_field() }}
       <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <input type="email" class="form-control inp__login"  placeholder="Username" name="email" value="{{ old('email') }}" required autofocus>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
       </div>
       <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <input type="password" class="form-control inp__login" placeholder="Password" name="password" required>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
       </div>
       <div class="form-group">
         <div class="checkbox i-checks">
           <label> <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}><i></i> Agree the terms and policy </label>
         </div>
       </div>
          <div class="text-center">
       <button type="submit" class="btn__ btn__primary m-b">Login</button>
          </div>

       <a href="{{ route('password.request') }}"><small>Forgot password?</small></a>

      </form>
      <p class="m-t"> <small>Seeb &copy; {{ date('Y') }}</small> </p>
    </div>
</div>
@endsection
