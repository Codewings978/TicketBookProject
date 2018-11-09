<?php 

namespace BookTheTicket\Traits;
use BookTheTicket\Studio;
trait GetStudios{

    public function GetAllStudios(){
        
        $studios = Studio::select('studio_name','id', 'studio_info')->orderBy('created_at', 'desc')->get();
      
        return $studios;      
        
    }

}