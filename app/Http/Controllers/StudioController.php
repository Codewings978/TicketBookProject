<?php

namespace BookTheTicket\Http\Controllers;

use Illuminate\Http\Request;
use BookTheTicket\Studio;
use BookTheTicket\User;
use Auth;
use BookTheTicket\TimeSlot;


class StudioController extends Controller
{
    

       
   public function createStudioPage(){
       
       if(!User::find(Auth::user()->id)->studio){
           
           return view('studio.createStudio')->with('permission', true);
       }
       else{
            return view('studio.createStudio')->with('permission', false);
           
       }
       
       
   }
    
   public function submitStudioData(Request $request){
           
     $this->validate( $request,
     [
         'name' => 'required|max:200',
         'about' => 'required|max:255',
         'contact' => 'required|numeric',
         'address' => 'required|alpha_dash',
         'city' => 'required|alpha',
         'country' => 'required|alpha',
         'opening' => 'required',
         'closing' => 'required',
        
     ],
     array('required' => 'Fill your Studio :attribute  field.'));
       
        $start_time = date("h:i A", strtotime( $request->input('opening')));
        $closing_time = date("h:i A", strtotime($request->input('closing')));
                             
       if($closing_time < $start_time){
           
           return redirect()->back()->with('error', 'Closing time cannot be smaller than Opening Time');
       }
       
       // Check if Studio related to user already exist, if not then insert the data
        $exist = User::find(Auth::user()->id)->studio;
       
       if(!$exist){
           
          $studios = new Studio();
          $studios->user_id = Auth::user()->id;
          $studios->studio_name = $request->input('name');
          $studios->studio_info = $request->input('about');
          $studios->studio_addrs = $request->input('address');
          $studios->studio_city = $request->input('city');
          $studios->studio_country = $request->input('country');
          $studios->studio_website = $request->input('website');
          $studios->studio_contact = $request->input('contact');
          $studios->studio_opening_time = $request->input('opening').":00";
          $studios->studio_closing_time = $request->input('closing').":00";
          
          $studios->save();    
  
       return redirect()->route('MyStudio');
           
       }
       else {
           return redirect()->back()->with('error','Oops! One studio is already registered with your account.');
       }
       
       
       

        
      
   }
    
    public function GetStudioPage($studio_id){
        
        $studio = Studio::find($studio_id);
        $my_page= false; 
        if($studio->user_id == Auth::user()->id){
            $my_page = true;
        }
        $time_slots = Studio::find($studio->id)->timeslots;
        
        return view('studio.showStudioPage')->with('studio', $studio)->with('my_page',$my_page  )->with('time_slots',$time_slots);
        
    }
    
    public function GetMyStudio(){
        
        $studio = User::find(Auth::user()->id)->studio;
        $time_slots = null;
        /*
        $start_time = date("h:i A", strtotime($studio->studio_opening_time));
        $closing_time = date("h:i A", strtotime($studio->studio_closing_time));
          $itr = 1;
          $time_slots = array();
          array_push($time_slots, $start_time );
          while($start_time < $closing_time){
              $start_time = date("h:i A", strtotime($studio->studio_opening_time) + 60*60* $itr );
              array_push($time_slots, $start_time );
              $itr++;
          }
        */
    	if($studio && $studio->count()){
            $time_slots = Studio::find($studio->id)->timeslots;
   
       }
         return view('studio.showStudioPage')->with('studio', $studio)->with('my_page',true)->with('time_slots',$time_slots);

    }
    
    
    public function updateStudioInfo(Request $request){
        
    $this->validate( $request,
     [
         'name' => 'required|max:200',
         'about' => 'required|max:255',
         'contact' => 'required|numeric',
         'address' => 'required|alpha_dash',
         'city' => 'required',
         'country' => 'required'
        
     ],
     array('required' => 'Fill your Studio :attribute  field.'));
        
 
        
     Studio::Where('user_id', Auth::user()->id)->update([
            'studio_name'=> $request->input('name'),
            'studio_info'=> $request->input('about'), 
            'studio_contact'=> $request->input('contact'), 
            'studio_addrs'=> $request->input('address'),
            'studio_city'=> $request->input('city'), 
            'studio_country'=> $request->input('country'),
            
        ]); 
        
      return redirect()->route('MyStudio');         
        
    }
    
    
    public function editStudioInfo(){
        $studio = User::find(Auth::user()->id)->studio;
        
        /*
        $start_time = date("H:i:s", strtotime($studio->studio_opening_time));
        $closing_time = date("H:i:s", strtotime($studio->studio_closing_time));
          $itr = 1;
          $time_slots = array();
          array_push($time_slots, $start_time );
          while($start_time < $closing_time){
              $start_time = date("H:i:s", strtotime($studio->studio_opening_time) + 60*60* $itr );
              array_push($time_slots, $start_time );
              $itr++;
          } */
        // dd($time_slots);
        
         return view('studio.edit')->with('studio', $studio);
         
     }
    
    public function createTimeSlots(Request $request){
        
        $slots = $request->addmore;
        sort($slots);

        for($i = 0; $i < count($slots)-1; $i++){
            
            if(round((strtotime($slots[$i+1]) - strtotime($slots[$i]))/3600, 1) < 1){
                
                return redirect()->back()->with('error','Time Conflicts in ticket booking time slots. Please ensure 1 hour gap.');
            }
            
        }
        
        $studio = User::find(Auth::user()->id)->studio;
        $dataSet = [];
        foreach($slots as $slot){
             $dataSet[] = [
                  'studio_id'=>$studio->id,
                  'slots'=>$slot,
                 
                ];
            
        }
        
      // dd($dataSet);
        
       TimeSlot::insert($dataSet);
       
        return redirect()->route('MyStudio');
    }
    
 
    
}
