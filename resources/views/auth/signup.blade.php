@extends('templates.header')

@section('content')

<br>
    <div class="col-md-6">
        <h3> Register here</h3>
        <hr>
<form  role="form" method="POST" action="{{ route('Register') }}">
            @csrf
  <div class="form-group row {{$errors->has('email')? 'has-error': ''}}">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>
             @if ($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
            @endif
  <div class="form-group row {{$errors->has('username')? 'has-error': ''}}">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" name="username" class="form-control" id="inputPassword3" placeholder="Username">
    </div>
  </div>
  <div class="form-group row {{$errors->has('password')? 'has-error': ''}}">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="password"  class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group row {{$errors->has('type')? 'has-error': ''}}">
    <label for="inputType" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-10">
      <input type="checkbox" name="type"  id="inputType" value="1"  > Register as Music Studio
    </div>
  </div>


    <input type="hidden" name="_token" value="{{ Session::token() }}" >
            
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Register</button>
      
    </div>
  </div>
            
            
</form>
    </div>
   
    
@stop


