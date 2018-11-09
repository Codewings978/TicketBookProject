<?php

namespace BookTheTicket;

use Illuminate\Database\Eloquent\Model;

class BookTicket extends Model
{
     protected $table='booktickets';
    
    public function timeslot(){
        
        return $this->belongsTo('BookTheTicket\TimeSlot','time_slot_id');
    }
   
     public function user(){
          return $this->belongsTo('BookTheTicket\User');
     } 
}
