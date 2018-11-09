@extends('templates.header')

@section('content')

<br>
    <div class="col-md-6">
        
    @if($permission)
        
        <h3>Create your Music Studio Page</h3>
        <hr>
        <form  role="form" method="POST" action="{{ route('CreateStudio') }}">
            @csrf
  <div class="form-group row {{$errors->has('name')? 'has-error': ''}}">
    <label for="inputStudio" class="col-sm-2 col-form-label">Studio Name</label>
    <div class="col-sm-10">
      <input type="text" name="name" class="form-control" id="inputStudio" placeholder="Studio name">
    </div>
  </div>
            @if ($errors->has('name'))
                <span class="help-block">{{ $errors->first('name') }}</span>
            @endif
    
     <div class="form-group row {{$errors->has('about')? 'has-error': ''}}">
    <label for="inputAbout" class="col-sm-2 col-form-label">About</label>
    <div class="col-sm-10">
        <textarea type="text" name="about" class="form-control" id="inputAbout" placeholder="Studio description"></textarea>
    </div>
  </div>
             @if ($errors->has('about'))
                <span class="help-block">{{ $errors->first('about') }}</span>
            @endif
            
     <div class="form-group row {{$errors->has('contact')? 'has-error': ''}}">
    <label for="inputContact" class="col-sm-2 col-form-label">Contact Number</label>
    <div class="col-sm-10">
      <input type="text" name="contact" class="form-control" id="inputContact" placeholder="Contact number">
    </div>
  </div>
             @if ($errors->has('contact'))
                    <span class="help-block">{{ $errors->first('contact') }}</span>
            @endif
            
            
 <div class="form-group row {{$errors->has('address')? 'has-error': ''}}">
    <label for="inputAddress" class="col-sm-2 col-form-label">Studio Address</label>
    <div class="col-sm-10">
      <input type="text" name="address" class="form-control" id="inputAddress" placeholder="Studio address">
    </div>
  </div>
            @if ($errors->has('address'))
                    <span class="help-block">{{ $errors->first('address') }}</span>
            @endif
   <div class="form-group row {{$errors->has('website')? 'has-error': ''}}">
    <label for="inputWebsite" class="col-sm-2 col-form-label">Website</label>
    <div class="col-sm-10">
      <input type="text" name="website" class="form-control" id="inputWebsite" placeholder="Website">
    </div>
  </div>
            @if ($errors->has('website'))
                    <span class="help-block">{{ $errors->first('website') }}</span>
            @endif
            
 <div class="form-group row {{$errors->has('city')? 'has-error': ''}}">
    <label for="inputCity" class="col-sm-2 col-form-label">City</label>
    <div class="col-sm-10">
      <input type="text" name="city" class="form-control" id="inputCity" placeholder="City">
    </div>
  </div>
            @if ($errors->has('city'))
                    <span class="help-block">{{ $errors->first('city') }}</span>
            @endif
            
 <div class="form-group row {{$errors->has('country')? 'has-error': ''}}">
    <label for="inputCountry" class="col-sm-2 col-form-label">Country</label>
    <div class="col-sm-10">
      <input type="text" name="country" class="form-control" id="inputCountry" placeholder="Country">
    </div>
  </div>
            @if ($errors->has('country'))
                    <span class="help-block">{{ $errors->first('country') }}</span>
            @endif
            
                  
            
 <div class="form-group row {{$errors->has('opening')? 'has-error': ''}}">
    <label for="inputOpening" class="col-sm-2 col-form-label">Opening Time</label>
    <div class="col-sm-10">
      <input type="time" name="opening" class="form-control" id="inputOpening" placeholder="Opening Time">
    </div>
  </div>
            @if ($errors->has('opening'))
                    <span class="help-block">{{ $errors->first('opening') }}</span>
            @endif
 
            
     <div class="form-group row {{$errors->has('closing')? 'has-error': ''}}">
    <label for="inputClosing" class="col-sm-2 col-form-label">Closing Time</label>
    <div class="col-sm-10">
      <input type="time" name="closing" class="form-control" id="inputClosing" placeholder="Closing Time">
    </div>
  </div>
            @if ($errors->has('closing'))
                    <span class="help-block">{{ $errors->first('closing') }}</span>
            @endif

            
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Create</button>
      
    </div>
  </div>
            
            
</form>
        
    @else
    
        <center>
        <p> <b>Oops! </b>Looks like you already has one <b><a href="{{ route('MyStudio') }}">Music Studio</a></b>.</p>
        </center>
        
    @endif
    
        
    </div>
   
    
@stop


