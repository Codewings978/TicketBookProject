<?php

namespace BookTheTicket;

use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    protected $table='timeslots';
    public $timestamps = true;
    
     protected $fillable = [
        'studio_id', 'slots'
    ];
    
    public function studio(){
        return $this->belongsTo('BookTheTicket\Studio');
    }
    
    
    public function booktickets(){
        
        return $this->hasMany('BookTheTicket\BookTicket');
    }
}
