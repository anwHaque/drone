<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drone;
use App\Pilot;
use App\User;
use App\FlightPlan;
use Auth;

class AdminController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function drone()
    {
        // dd('mjghjg');
        $drones  = Drone::with('user')->paginate(5);

        return view('admin.drone')->with('drones',$drones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function flightPlan()
    {
    	
    	$flightPlans  = FlightPlan::paginate(5);
        return view('admin.flight_plan')->with('flightPlans',$flightPlans);
    }

    public function pilot()
    {
		// $pilots = Pilot::select('pilot_id')->get()->toArray();
       // dd('flight pilot');
        $pilots = User::where('role',2)->paginate(5);
        return view('admin.pilot')->with('pilots',$pilots);
    }

    public function operator()
    {
		// $pilots = Pilot::select('pilot_id')->get()->toArray();
       // dd('flight operator');
        $operators = User::where('role',1)->paginate(5);
        return view('admin.operator')->with('operators',$operators);
    }
    public function map()
    {
          $flightPlans  = FlightPlan::paginate(5);
        return view('admin.map')->with('flightPlans',$flightPlans);
    }
    public function getMap(){
        $loc = [];
          $flightPlans  = FlightPlan::select('lat','lng')->get()->toArray();
          $a =[];
          foreach ($flightPlans as $value) {
          
             array_push($a,$value);
          }
          // dd($a);
          // dd($flightPlans);
          

        return $a;
        // $markers = [
        // [23.2313, 77.4326],
        // [23.2344, 77.4354],
        // [23.2356, 77.4006],
        // [23.2303, 77.4327],];
        // return $markers;
    }
   
}
