<?php

namespace BookTheTicket\Http\Controllers;

use Illuminate\Http\Request;
use BookTheTicket\Traits\GetStudios;


class HomeController extends Controller
{
    
    use GetStudios; 
    
    public function index(){
        
        $studios = $this->GetAllStudios();
       
        return view('home')->with('studios',$studios );
    }
    
    public function landingPage(){
        
        return view('landing');
    }
    
   
}
