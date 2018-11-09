@extends('templates.header')

@section('content')
    <center>
        <h3> Welcome to BookTheTicket</h3>
        <p>Online platform to Book your tickets for the Music Studios</p>
        <hr>
    </center>
    
    <div class="col-md-8">
<h3>Showing all Music studios</h3>
        <hr>

     @if(!count($studios) )
        <p>There is no studio yet!</p>
     @else
       
        @foreach($studios as $studio)
        <div> 
        <a href="{{ route('GetStudio',['id'=>$studio->id ]) }}">
            <h4>{{ $studio->studio_name }}</h4>
            
        </a>
            <p>{{ $studio->studio_info }}</p>
        </div>
        @endforeach
       
    @endif
        
    </div>
@stop