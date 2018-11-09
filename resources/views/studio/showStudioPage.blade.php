@extends('templates.header')

@section('content')

<br>
  @if($my_page)
     
        @if(!$studio)
            <center>
                <p> Create your Music Studio</p>
                 <p><a class="btn btn-primary pull-right" href="{{ route('CreateStudio') }}" role="button">Create</a></p>
            </center>
        @else
             <p><a class="btn btn-primary" href="{{ route('editStudioInfo') }}" role="button">Edit</a></p>
            <p><a class="btn btn-primary" href="{{ route('BookedTickets') }}" role="button">View Booked Tickets</a></p>
             
        @endif
     @endif
<div class="col-md-8">
   
    
    @if($studio)
    
    <h3> {{ $studio->studio_name}}</h3>
    <p>{{ $studio->studio_info }} </p>
    <p><b>Address:</b> {{ $studio->studio_addrs  }}</p>
    <p><b>City:</b> {{ $studio->studio_city  }}</p>
    <p><b>Country:</b> {{ $studio->studio_country  }}</p>
    <p><b>Contact:</b> {{ $studio->studio_contact  }}</p>
    <p><b>Opening Time:</b> {{ date("h:i A", strtotime($studio->studio_opening_time)) }}</p>
    <p><b>Closing Time:</b> {{ date("h:i A", strtotime($studio->studio_closing_time))}}</p>
    <p><b>Website:</b> <a href="{{ $studio->studio_website }}">{{ $studio->studio_website  }}</a></p>
    <hr>
    
 
    @if(!count($time_slots) )
            
    
        @if($my_page)
    
     <h4>Create Time slots for ticket booking</h4>
    
     <div class="col-sm-6">

       <form  role="form" method="POST" action="{{ route('createTimeSlots') }}">
           @csrf
           
       <div class="input-group control-group after-add-more">
           <input type="time" name="addmore[]" class="form-control" placeholder="Time" value="{{ $studio->studio_opening_time }}">
          <div class="input-group-btn"> 
            <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> +</button>
          </div>
        </div>
     

           
      
       <div class="form-group row" style="margin-top:10px">
           <div class="col-sm-10">
               <button type="submit" class="btn btn-primary">Create</button>
            </div>
       </div>
       </form>
      <!-- Copy Fields -->
        <div class="copy hide invisible">
          <div class="control-group input-group" style="margin-top:10px">
            <input type="time" name="addmore[]" class="form-control" placeholder="Time" value="{{ $studio->studio_opening_time }}">
            <div class="input-group-btn"> 
              <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> -</button>
            </div>
          </div>
        </div>
    </div> 
    
    <!-- Else if not user's studio -->
            @else   
    
        <h4>Time slots for ticket booking</h4>
        <p>No time slots created for ticket booking yet.</p>
    
     <!-- End of MyPage -->
            @endif
    
     <!-- Else if there are  TimeSlots  available -->
        @else
    <h4>Time slots for ticket booking</h4>
    
    @if(Auth::user()->is_studio)
    
     @foreach($time_slots as $time_slot)
        
            <div>
                <p>{{  date("h:i A", strtotime($time_slot->slots)) }} -  {{ date("h:i A", strtotime($time_slot->slots) + 60*60) }}  </p>
               
            </div>
    
    @endforeach

     <!-- Else if user type is not studio -->
    @else
    <form method="post" action="{{ route('BookTicket') }}"> 
       @csrf
               
        @foreach($time_slots as $time_slot)
        
            <div>
                <p>{{  date("h:i A", strtotime($time_slot->slots)) }} -  {{ date("h:i A", strtotime($time_slot->slots) + 60*60) }} 
                    
              <input type="radio" name="time_slot" value="{{ $time_slot->id }}" /><br>  
                
                </p>
               
            </div>
    
        @endforeach

        <input class="form-control" type="date" name="date" placeholder="date">
     
        <button type="submit" class="btn btn-primary" style="margin-top:10px">Book</button>
      </form>
    
    
    @endif
     
        @endif
    
    
    @else
    @endif
</div>

@stop


