<?php

namespace BookTheTicket;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    public function user(){
        
        return $this->belongsTo('BookTheTicket\User');
    }
    
    public function timeslots(){
        
        return $this->hasMany('BookTheTicket\TimeSlot');
    }
}
