<?php

namespace BookTheTicket\Http\Controllers;

use Illuminate\Http\Request;
use BookTheTicket\TimeSlot;
use BookTheTicket\BookTicket;
use BookTheTicket\Studio;
use Auth;
use DateTime;
use DB;

class TicketController extends Controller
{
    
    public function bookStudioTicket(Request $request){
        
     $this->validate( $request,
     [
         'time_slot' => 'required',
         'date' => 'required'
     ],
    array('required' => 'Please fill :attribute .',));
        
        
    $now = new DateTime('Today');
    $date = new DateTime($request->input('date')); 

    if($date  <= $now )
    {  
        return redirect()->back()->with('error','Invalid date and time! ');
    }
    else{
        
                      
      $exist = TimeSlot::find($request->input('time_slot'))->get();
        if($exist && $exist->count()){
            
            // if exist then chek if timeslot is not already occupied by someone
            $occupied = BookTicket::where('timeslot_id',$request->input('time_slot'))->where('booked_date',$request->input('date'))->get();
            
          
            // if not occupied then only save the data in table
            if(count($occupied) == 0){
                
                $ticket = new BookTicket();
                $ticket->timeslot_id = $request->input('time_slot');
                $ticket->booked_date = $request->input('date');
                $ticket->studio_id = $exist->studio_id;
                $ticket->user_id = Auth::user()->id;
                $ticket->save(); 
                
                return redirect()->route('Home')->with('info','Your ticket booked successfully!');
                
            }else{
                
                 return redirect()->back()->with('error','Oops! This time slot is already booked.');
            }
           
        } else{
            
             return redirect()->back()->with('error','Oops! Time slot does not exist. ');
        }
       
        
    }
       
      
    }
    
    public function ticketBookingHistory(){
        
        $tickets = BookTicket::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
        return view('tickets.myTickets')->with('tickets',$tickets);
    }
    
    public function BookedTickets(){
        $studio = Studio::where('user_id', Auth::user()->id)->first();             
        $tickets = BookTicket::where('studio_id', $studio->id )->get();
       // dd($tickets);
        return view('tickets.studioTickets')->with('tickets', $tickets);
    }
}
