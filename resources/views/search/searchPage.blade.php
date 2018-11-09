@extends('templates.header')

@section('content')

<br>
<h3>Search results for <b>{{ $keyword }}</b></h3>
<hr>
 <div class="col-md-6">


     @if(!count($studios) )
        <p>No results!</p>
     @else
       
        @foreach($studios as $studio)
        <div> 
        <a href="{{ route('GetStudio',['id'=>$studio->id ]) }}">
            <h4>{{ $studio->studio_name }}</h4>
        </a>
        </div>
        @endforeach
       
    @endif
        
    </div>
@stop


