<?php

namespace BookTheTicket\Http\Controllers;

use Illuminate\Http\Request;
use BookTheTicket\Studio;

class SearchController extends Controller
{
   
   
    public function searchStudio(Request $request){
        $name = null;
        if($request->search_keyword){
             $name = trim($request->search_keyword); 
        }
       
        $studios = Studio::Where('studio_name', 'like', '%' . $name . '%')->get();
        
        return view('search.searchPage')->with('studios',$studios)->with('keyword',$name);
        
    }
    
    public function getAdvanceSearchPage(){
        
        return view('search.advanceSearch');
    }
    
    public function searchByFilter(Request $request){
     $this->validate( $request,
     [
         'name' => 'max:255|nullable',
         'city' => 'alpha|nullable',
         'country' => 'alpha|nullable',    
     ],
     array('required' => 'Incorrect input for :attribute  field.',));
     
    $city = $request->input('city'); 
    $name = $request->input('name'); 
    $country = $request->input('country');  
    $filters = array();
   
     if(!isset($name) && !isset($city) && !isset($country)) {
        
        return redirect()->back()->with('error', 'Please fill atleast one field to search.');
    }   
     $searchQuery = Studio::query();
        
     $results = null;
    
     if(isset($name)){
       $name = trim($name); 
         
       $search_terms = explode(' ', $name);
       //  array_push($fitlers, 'name')

      foreach ($search_terms as $term)
      {    
         $searchQuery->orWhere('studio_name', 'LIKE', '%'. $term .'%');
        }
         
     }
 
     if(isset($city)){
       $city = trim($city);   
       $searchQuery->Where('studio_city', 'LIKE', '%'. $city .'%');

     }
 
     if(isset($country)){
       $country = trim($country);  
       $searchQuery->Where('studio_country', 'LIKE', '%'. $country .'%');
     }
        
        
    $searchResult = $searchQuery->get();
      
    return view('search.searchPage')->with('studios', $searchResult )->with('keyword','');
  
    }
    
    
    
}
