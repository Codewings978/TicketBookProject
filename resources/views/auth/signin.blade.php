@extends('templates.header')

@section('content')

<br>
    <div class="col-md-6">
        <h3>Login here</h3>
        <hr>
        <form role="form" method="POST" action="{{ route('Login') }}">
            @csrf
  <div class="form-group row {{$errors->has('email')? 'has-error': ''}}">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
    </div>
  </div>
            @if ($errors->has('email'))
                    <span class="help-block">{{ $errors->first('email') }}</span>
            @endif
  <div class="form-group row {{$errors->has('password')? 'has-error': ''}}">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
    </div>
  </div>
            @if ($errors->has('password'))
                    <span class="help-block">{{ $errors->first('password') }}</span>
            @endif


  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Login</button>
    </div>
  </div>
</form>
    </div>
   
    
@stop


