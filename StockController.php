<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock as StockInfo;
use App\HospitalDonor as H_donor;

class StockController extends Controller
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
       

        return view('stock');

    }



    public function update(Request $request)
    {

        if ($request->blood_type == 'A+'){
            
            $units = StockInfo::where('blood_type',$request->blood_type)->first();
            $int_units = (int)$units->units;
            StockInfo::where('blood_type', $request->blood_type)
                    ->update([
                        'units' => $request->units + $int_units
                        ]);

            H_donor::create($request->all());
            return redirect('home')->with('success', 'Donation add successfully');

        }


        if ($request->blood_type == 'A-'){
            
            $units = StockInfo::where('blood_type',$request->blood_type)->first();
            $int_units = (int)$units->units;
            StockInfo::where('blood_type', $request->blood_type)
                    ->update([
                        'units' => $request->units + $int_units
                        ]);

            H_donor::create($request->all());
            return redirect('home')->with('success', 'Donation add successfully');

        }


        if ($request->blood_type == 'B+'){
            
            $units = StockInfo::where('blood_type',$request->blood_type)->first();
            $int_units = (int)$units->units;
            StockInfo::where('blood_type', $request->blood_type)
                    ->update([
                        'units' => $request->units + $int_units
                        ]);

            H_donor::create($request->all());
            return redirect('home')->with('success', 'Donation add successfully');

        }


        if ($request->blood_type == 'B-'){
            
            $units = StockInfo::where('blood_type',$request->blood_type)->first();
            $int_units = (int)$units->units;
            StockInfo::where('blood_type', $request->blood_type)
                    ->update([
                        'units' => $request->units + $int_units
                        ]);

            H_donor::create($request->all());
            return redirect('home')->with('success', 'Donation add successfully');

        }


        if ($request->blood_type == 'AB+'){
            
            $units = StockInfo::where('blood_type',$request->blood_type)->first();
            $int_units = (int)$units->units;
            StockInfo::where('blood_type', $request->blood_type)
                    ->update([
                        'units' => $request->units + $int_units
                        ]);

            H_donor::create($request->all());
            return redirect('home')->with('success', 'Donation add successfully');

        }

        if ($request->blood_type == 'AB-'){
            
            $units = StockInfo::where('blood_type',$request->blood_type)->first();
            $int_units = (int)$units->units;
            StockInfo::where('blood_type', $request->blood_type)
                    ->update([
                        'units' => $request->units + $int_units
                        ]);

            H_donor::create($request->all());
            return redirect('home')->with('success', 'Donation add successfully');

        }


        if ($request->blood_type == 'O+'){
            
            $units = StockInfo::where('blood_type',$request->blood_type)->first();
            $int_units = (int)$units->units;
            StockInfo::where('blood_type', $request->blood_type)
                    ->update([
                        'units' => $request->units + $int_units
                        ]);

            H_donor::create($request->all());
            return redirect('home')->with('success', 'Donation add successfully');

        }


        if ($request->blood_type == 'O-'){
            
            $units = StockInfo::where('blood_type',$request->blood_type)->first();
            $int_units = (int)$units->units;
            StockInfo::where('blood_type', $request->blood_type)
                    ->update([
                        'units' => $request->units + $int_units
                        ]);

            H_donor::create($request->all());
            return redirect('home')->with('success', 'Donation add successfully');

        }



    }





    public function update1(Request $request, $id)
    {

        try{
            $patient = PatientInfo::find($id);
            $patient->status = 1;
            $patient->save();
            return redirect('patient')->with('success', 'Patient request has been accepted');

        }

        catch (\Illuminate\Database\QueryException $exception) {
            return back()->with('error', 'Error');
        }

    }




}


