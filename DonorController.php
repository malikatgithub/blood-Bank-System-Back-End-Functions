<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donor as DonorInfo;
use App\Stock as StockInfo;

class DonorController extends Controller
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
        $donors = DonorInfo::whereNull('status')->get();
        $Bpositive = DonorInfo::where('blood_type', 'B+');
        $Opositive = DonorInfo::where('blood_type', 'O+');
        $Cpositive = DonorInfo::where('blood_type', 'C+');
        $ABpositive = DonorInfo::where('blood_type', 'AB+');

        $reject = DonorInfo::where('status', '0');
        $accept = DonorInfo::where('status', '1');


        return view('donors')
        ->with('donors', $donors)
        ->with('accept', $accept)
        ->with('reject', $reject)
        ->with('Bpositive', $Bpositive)
        ->with('Opositive', $Opositive)
        ->with('Cpositive', $Cpositive)
        ->with('ABpositive', $ABpositive);

    }


    public function update1(Request $request, $id)
    {

        try{
            $donor = DonorInfo::find($id);
            $donor->status = 1;
            $donor->save();
            



            /* Donation Email Function Accept 
            $to = "$donor->email";
            $subject = "Your Donation has been Accepted !";
            $txt = "Thanks for your donation and for saving lives !";
            $headers = "From: NHBL , Donation Acceptence Center" . "\r\n";

            mail($to,$subject,$txt,$headers);*/


            $donorunit = 1;

            if ($donor->blood_type == 'A+'){
            
                $units = StockInfo::where('blood_type',$donor->blood_type)->first();
                $int_units = (int)$units->units;
                StockInfo::where('blood_type', $donor->blood_type)
                        ->update([
                            'units' => $donorunit + $int_units
                            ]);
    
            }
    
    
            if ($donor->blood_type == 'A-'){
                
                $units = StockInfo::where('blood_type',$donor->blood_type)->first();
                $int_units = (int)$units->units;
                StockInfo::where('blood_type', $donor->blood_type)
                        ->update([
                            'units' => $donorunit + $int_units
                            ]);
    
            }
    
    
            if ($donor->blood_type == 'B+'){
                
                $units = StockInfo::where('blood_type',$donor->blood_type)->first();
                $int_units = (int)$units->units;
                StockInfo::where('blood_type', $donor->blood_type)
                        ->update([
                            'units' => $donorunit + $int_units
                            ]);

            }
    
    
            if ($donor->blood_type == 'B-'){
                
                $units = StockInfo::where('blood_type',$donor->blood_type)->first();
                $int_units = (int)$units->units;
                StockInfo::where('blood_type', $donor->blood_type)
                        ->update([
                            'units' => $donorunit + $int_units
                            ]);
    
            }
    
    
            if ($donor->blood_type == 'AB+'){
                
                $units = StockInfo::where('blood_type',$donor->blood_type)->first();
                $int_units = (int)$units->units;
                StockInfo::where('blood_type', $donor->blood_type)
                        ->update([
                            'units' => $donorunit + $int_units
                            ]);
    
            }
    
            if ($donor->blood_type == 'AB-'){
                
                $units = StockInfo::where('blood_type',$donor->blood_type)->first();
                $int_units = (int)$units->units;
                StockInfo::where('blood_type', $donor->blood_type)
                        ->update([
                            'units' => $donorunit + $int_units
                            ]);
    
            }
    
    
            if ($donor->blood_type == 'O+'){
                
                $units = StockInfo::where('blood_type',$donor->blood_type)->first();
                $int_units = (int)$units->units;
                StockInfo::where('blood_type', $donor->blood_type)
                        ->update([
                            'units' => $donorunit + $int_units
                            ]);
    
            }
    
    
            if ($donor->blood_type == 'O-'){
                
                $units = StockInfo::where('blood_type',$donor->blood_type)->first();
                $int_units = (int)$units->units;
                StockInfo::where('blood_type', $donor->blood_type)
                        ->update([
                            'units' => $donorunit + $int_units
                            ]);
    
           
    
            }


            return redirect('donor')->with('success', 'Donation has been accepted');


        }

        catch (\Illuminate\Database\QueryException $exception) {
            return back()->with('error', 'Error');
        }

    }



    public function update2(Request $request, $id)
    {

        try{
            $donor = DonorInfo::find($id);
            $donor->status = 0;
            $donor->r_comment = $request->r_comment;
            $donor->save();
            return redirect('donor')->with('delete', 'Donation has been rejected');


             /* Donation Email Function Accept 
             $to = "$donor->email";
             $subject = "Your Donation has been Rejected!";
             $txt = "Thanks for your donation, Unfortionatly Donation Reject Cause :  $request->r_comment !";
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
        $data = DonorInfo::where('status', '1')->get();

        if($request->operation == 'print')
        {
            return view('dreports')
            ->with('data', $data)
            ->with('operation', 'print')->with('report_type', 'Accept')
            ;
        }

        else{
            return view('dreports')
            ->with('data', $data)
            ->with('operation', 'show')->with('report_type', 'Accept')
            ;
        }
       
    }

   public function rejectReport(Request $request)
    {
        $data = DonorInfo::where('status', '0')->get();
      

        if($request->operation == 'print')
        {
            return view('dreports')
            ->with('data', $data)
            ->with('operation', 'print')->with('report_type', 'Reject');
            
        }

        else{
            return view('dreports')
            ->with('data', $data)
            ->with('operation', 'show')->with('report_type', 'Reject');
        }
    }

   public function pendingReport(Request $request)
    {
        $data = DonorInfo::whereNull('status')->get();

        if($request->operation == 'print')
        {
            return view('dreports')
            ->with('data', $data)
            ->with('operation', 'print')->with('report_type', 'Pending');
            
        }
        else{
            return view('dreports')
            ->with('data', $data)
            ->with('operation', 'show')->with('report_type', 'Pending');
        /*return view('dreports')
        ->with('data', $data);*/
    }
}


 


    public function store(Request $request)
    {

        
        $data = DonorInfo::create($request->all());

        return redirect('donor_page')->with('success', 'Done, your Donation request is pending now ');

    }


}


