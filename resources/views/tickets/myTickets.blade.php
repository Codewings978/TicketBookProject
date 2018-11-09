@extends('templates.header')

@section('content')
   
<h3>Ticket Booking history</h3>
        
<hr>
   
    
<div class="col-md-8">
@if(!$tickets->isEmpty())
<div class="panel panel-default">

  <div class="panel-heading">Showing tickets booked by you</div>

  <table class="table">
      
      
  <tr>
      <td>*</td>
      <td><b>Music Studio</b> </td>
      <td><b>Date</b></td>
      <td><b>Time Slot</b> </td>
      <td><b>Booking Date</b> </td>
      
  </tr>
    @foreach($tickets as $ticket)
   <tr>
      <td>*</td>
      <td><a href=" {{ route('GetStudio',['id'=>$ticket->timeslot->studio_id ]) }}">{{ $ticket->timeslot->studio->studio_name }}</a></td>
      <td>{{ $ticket->booked_date }}</td> 
      <td>{{  date("h:i A", strtotime($ticket->timeslot->slots)) }} -  {{ date("h:i A", strtotime($ticket->timeslot->slots) + 60*60) }} </td>
      <td>{{ $ticket->created_at->format('d/m/Y') }} </td>
      
  </tr>    
      

    @endforeach
  </table>
    
</div>
@else
<p> No Tickets booked by you yet!</p>
    
@endif 

</div>
@stop