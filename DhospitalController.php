<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\HospitalDonor as H_donor;

class DhospitalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        $data = H_donor::all();
        return view('dhospital')
        ->with('data', $data);

    }





}


