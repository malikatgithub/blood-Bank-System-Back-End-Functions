<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient as PatientInfo;
use App\Stock as StockInfo;

class PatientController extends Controller
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
        $patient = PatientInfo::whereNull('status')->whereNull('p_h_name')->get();


        $p_h_patient = PatientInfo::whereNull('status')->whereNull('name')->get();

        $reject = PatientInfo::where('status', '0');
        $accept = PatientInfo::where('status', '1');


        return view('patient')
        ->with('p_h_patient', $p_h_patient)
        ->with('patient', $patient)
        ->with('accept', $accept)
        ->with('reject', $reject);

    }


    public function update1(Request $request, $id)
    {

        try{
            $patient = PatientInfo::find($id);
            $patient->status = 1;
            if ($patient->blood_type == 'A+'){
            
            $units = StockInfo::where('blood_type',$patient->blood_type)->first();
            $int_units = (int)$units->units;
            StockInfo::where('blood_type', $patient->blood_type)
                    ->update([
                        'units' => $int_units - $patient->units 
                        ]); 
                                             }

             if ($patient->blood_type == 'A-'){
            
            $units = StockInfo::where('blood_type',$patient->blood_type)->first();
            $int_units = (int)$units->units;
            StockInfo::where('blood_type', $patient->blood_type)
                    ->update([
                        'units' => $int_units - $patient->units 
                        ]); 
                                             }

            if ($patient->blood_type == 'B+'){
            
            $units = StockInfo::where('blood_type',$patient->blood_type)->first();
            $int_units = (int)$units->units;
            StockInfo::where('blood_type', $patient->blood_type)
                    ->update([
                        'units' => $int_units - $patient->units 
                        ]); 
                                             }

            if ($patient->blood_type == 'B-'){
            
            $units = StockInfo::where('blood_type',$patient->blood_type)->first();
            $int_units = (int)$units->units;
            StockInfo::where('blood_type', $patient->blood_type)
                    ->update([
                        'units' => $int_units - $patient->units 
                        ]); 
                                             }

            if ($patient->blood_type == 'O+'){
            
            $units = StockInfo::where('blood_type',$patient->blood_type)->first();
            $int_units = (int)$units->units;
            StockInfo::where('blood_type', $patient->blood_type)
                    ->update([
                        'units' => $int_units - $patient->units 
                        ]); 
                                             }

            if ($patient->blood_type == 'O-'){
            
            $units = StockInfo::where('blood_type',$patient->blood_type)->first();
            $int_units = (int)$units->units;
            StockInfo::where('blood_type', $patient->blood_type)
                    ->update([
                        'units' => $int_units - $patient->units 
                        ]); 
                                             }

            if ($patient->blood_type == 'AB+'){
            
            $units = StockInfo::where('blood_type',$patient->blood_type)->first();
            $int_units = (int)$units->units;
            StockInfo::where('blood_type', $patient->blood_type)
                    ->update([
                        'units' => $int_units - $patient->units 
                        ]); 
                                             }

             if ($patient->blood_type == 'AB-'){
            
            $units = StockInfo::where('blood_type',$patient->blood_type)->first();
            $int_units = (int)$units->units;
            StockInfo::where('blood_type', $patient->blood_type)
                    ->update([
                        'units' => $int_units - $patient->units 
                        ]); 
                                             }
            $patient->save();
            return redirect('patient')->with('success', 'Patient request has been accepted');

             
            
            /* Patient Email Function Accept 
            $to = "$patient->email";
            $subject = "Your Request has been Accepted !";
            $txt = "Your request has been approved, come and take your needs :) ";
            $headers = "From: NHBL , Donation Acceptence Center" . "\r\n";

            mail($to,$subject,$txt,$headers);*/

        }

        catch (\Illuminate\Database\QueryException $exception) {
            return back()->with('error', 'Error');
        }
         
         

    }



    public function update2(Request $request, $id)
    {

        try{
            $patient = PatientInfo::find($id);
            $patient->status = 0;
            $patient->r_comment = $request->r_comment;
            $patient->save();
            return redirect('patient')->with('delete', 'Patient request has been rejected');


             /* Patient Email Function Accept 
             $to = "$Patient->email";
             $subject = "Your Request has been Rejected!";
             $txt = "Unfortionatly your request has been Rejected Cause :  $request->r_comment !";
             $headers = "From: NHBL , Donation Acceptence Center" . "\r\n";
 
             mail($to,$subject,$txt,$headers);
             */


        }

        catch (\Illuminate\Database\QueryException $exception) {
            return back()->with('error', 'Error');
        }

    }


    public function acceptReport(Request $request)
    {
        $data = PatientInfo::where('status', '1')->whereNull('p_h_name')->get();

        if($request->operation == 'print')
        {
            return view('r_reports')
            ->with('data', $data)
            ->with('operation', 'print')->with('report_type', 'Accept')
            ;
        }

        else{
            return view('r_reports')
            ->with('data', $data)
            ->with('operation', 'show')->with('report_type', 'Accept')
            ;
        }
       
    }

    public function rejectReport(Request $request)
    {
        $data = PatientInfo::where('status', '0')->whereNull('p_h_name')->get();
      

        if($request->operation == 'print')
        {
            return view('r_reports')
            ->with('data', $data)
            ->with('operation', 'print')->with('report_type', 'Reject');
            
        }

        else{
            return view('r_reports')
            ->with('data', $data)
            ->with('operation', 'show')->with('report_type', 'Reject');
        }
    }

   public function pendingReport(Request $request)
    {
        $data = PatientInfo::whereNull('status')->whereNull('p_h_name')->get();

        if($request->operation == 'print')
        {
            return view('r_reports')
            ->with('data', $data)
            ->with('operation', 'print')->with('report_type', 'Pending');
            
        }
        else{
            return view('r_reports')
            ->with('data', $data)
            ->with('operation', 'show')->with('report_type', 'Pending');
     
    }


}



public function store(Request $request)
{

    $data = PatientInfo::create($request->all());

    return redirect('patient_page')->with('success', 'Done, your request is pending now ');
}




}


