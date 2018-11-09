@extends('templates.header')

@section('content')

<br>
<h3>Advance Search for Music Studios</h3>
<hr>
 <div class="col-md-6">
     <form  role="form" method="POST" action="{{ route('AdvanceSearch') }}">
            @csrf
  <div class="form-group row {{$errors->has('name')? 'has-error': ''}}">
    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" name="name" class="form-control" id="inputName" placeholder="Name">
    </div>
  </div>
     @if ($errors->has('name'))
            <span class="help-block">{{ $errors->first('name') }}</span>
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
   
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Search</button>
      
    </div>
  </div>
            
            
</form>

     
        
</div>
@stop


