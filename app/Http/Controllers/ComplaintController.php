<?php

namespace App\Http\Controllers;

use App\Complaint;
use Illuminate\Http\Request;
use App\Status;
use App\OtpVerify;
use DB;
use App\ComplaintComments;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = Complaint::with('status')->where('confidentiality', 'Public')->get();
        return view('complaints.public_complaints.index',   compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $states = DB::table('states')->get();
        return view('complaints.public_complaints.create',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $complaint_status = Status::where('name','Initiated')->get()->toArray();

        if($complaint_status){
            $status_id = $complaint_status[0]['id'];
        }
        
        $complaint = new Complaint();
        $complaint->name = $request->name; 
        $complaint->gender = $request->gender; 
        $complaint->age = $request->age; 
        $complaint->phone_number = $request->phone_number; 
        $complaint->email = $request->email; 
        $complaint->country = $request->country; 
        $complaint->correspondence_address = $request->correspondence_address; 
        $complaint->state_id = $request->state; 
        $complaint->district_id = $request->district; 
        $complaint->police_station = $request->police_station; 
        $complaint->pin_code = $request->pin_code; 
        $complaint->complaint_related_to = $request->complaint_related_to; 
        $complaint->vistim_accused = $request->vistim_accused; 
           
        //Fir copy image    
        if($request->fir_copy){
            $fileName = time().'_'.$request->fir_copy->getClientOriginalName();
            $filePath = $request->file('fir_copy')->storeAs('complaints/fir/', $fileName, 'public');
            $complaint->fir_copy = $fileName; 
        }


        if($request->grievance_file){
            $fileName = time().'_'.$request->grievance_file->getClientOriginalName();
            $filePath = $request->file('grievance_file')->storeAs('complaints/grievance/', $fileName, 'public');
            $complaint->grievance = $fileName; 
        }else{
            $complaint->grievance = $request->grievance; 
        }

        //User ID proof image
        $fileName = time().'_'.$request->id_proof->getClientOriginalName();
        $filePath = $request->file('id_proof')->storeAs('complaints/id_proof/', $fileName, 'public');
        $complaint->id_proof = $fileName; 

        $complaint->address_proof = $request->address_proof; 
    
        //User Image            
        $fileName = time().'_'.$request->photo->getClientOriginalName();
        $filePath = $request->file('photo')->storeAs('complaints/photo/', $fileName, 'public');
        $complaint->photo = $fileName; 
        
        $complaint->status_id = $status_id; 
        $complaint->confidentiality = $request->confidentiality; 

        //ComplaintNumber
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $complaint_number = substr(str_shuffle($chars),0,10);
        $complaint->complaint_number = $complaint_number;

        $complaint->save();

        return redirect()->route('complaint.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function edit(Complaint $complaint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complaint $complaint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        //
    }

    public function generateOTP(){
        $otp = mt_rand(1000,9999);
        return $otp;
    }

    public function complaint_status(Request $request){
        $complaints = Complaint::with('status','state','district')
                                                    ->where('confidentiality', 'Public')
                                                    ->where('complaint_number', $request->complaint_no)
                                                    ->get();
        return view('complaints.public_complaints.complaint_status',   compact('complaints'));
    }

    public function complaint_details($complaint_number){
        $complaint = Complaint::with('status','state','district','complaint_comments')
                                                    ->where('confidentiality', 'Public')
                                                    ->where('complaint_number', $complaint_number)
                                                    ->get()->toArray()[0];
                                                    // dd($complaint['complaint_comments']);
        return view('complaints.public_complaints.complaint_detail',   compact('complaint'));
    }

    public function  add_comment(Request $request)
    {

        if($request->complaint_id){
                $comments = new ComplaintComments();
                $comments->email = $request->email;
                $comments->comment = $request->comment;
                $comments->complaint_id = $request->complaint_id;
                $comments->save();
        
            $all_Comments = ComplaintComments::where('complaint_id', $request->complaint_id)->get()->toArray();
        }  
        return response()->json($all_Comments);

    }
    
}
