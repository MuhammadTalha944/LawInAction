<?php

namespace App\Http\Controllers;

use App\Complaint;
use App\ComplaintLogs;
use Illuminate\Http\Request;
use App\Status;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;

class ComplaintsDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


//        check if have permission of evaluator then get data of status = 0 to evaluate for current district
        if (Auth::user()->hasRole('Complaint Evaluator')) {
            $complaints = Complaint::with('status')
                ->where('district_id', '=', Auth::user()->membership->district)
                ->where('redressal_status', '=', 0)
                ->get();
        } else if (Auth::user()->hasRole('Complaint Status Tranlator')) {
            $complaints = Complaint::with('status')
                ->where('district_id', '=', Auth::user()->membership->district)
                ->where('redressal_status', '=', 5)
                ->get();
        } else if (Auth::user()->hasRole('Complaint Incharge')) {
            $complaints = Complaint::with('status')
                ->where('district_id', '=', Auth::user()->membership->district)
                ->where('redressal_status', '=', 1)
                ->get();
        } else if (Auth::user()->hasRole('Complaint Closer')) {
            $complaints = Complaint::with('status')
                ->where('district_id', '=', Auth::user()->membership->district)
                ->where('redressal_status', '=', 2)
                ->get();
        } else {
            $complaints = Complaint::with('status')
                ->where('redressal_status', '!=', 3)
                ->get();
        }

        return view('complaints.dashboard.index', compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = Status::where('id', $request->status)->get()->toArray();
        $cmpl_status = $status[0]['name'];

        $details = [
            'name' => $request->name,
            'body' => $request->remakrs,
            'status' => $cmpl_status
        ];
        \Mail::to($request->email)->send(new \App\Mail\ComplaintReplyMail($details));

        Complaint::whereId($request->complaint_id)->update(['status_id' => $request->status]);

        return redirect()->route('complaint_section.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $complaint_status = Status::get();

        $complaint = Complaint::with('status', 'state', 'district')
            ->where('complaint_number', '=', $id)
            ->get()->toArray();

        $complaint_logs = ComplaintLogs::with('user')
            ->where('complaint_id','=',$complaint[0]['id'])
            ->get()
            ->toArray();

        $redressalStatus = array(
            0 => 'Evaluator',
            1 => 'Incharge',
            2 => 'Closer',
            5 => 'Translator'
        );

        if ($complaint) {
            return view('complaints.dashboard.show', compact('complaint', 'complaint_status','complaint_logs','redressalStatus'));
        }else{
            abort();
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function redressal(Request $request)
    {


        $status = $request->input('status');
        $status_from = $request->input('status_from');
        $complaint_id = $request->input('complain_id');
        $complaint_no = $request->input('complaint_no');
        $remarks = $request->input('redressal_remarks');

        if ($status_from == 5) {
            $file = $request->file('translated_complain');

//        //Move Uploaded File
            $destinationPath = 'translated_documents';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $updateArray['translated_file'] = $fileName;

            $lastAddedStatus = ComplaintLogs::where('complaint_id','=',$complaint_id)->latest('id')->first();
            $status = $lastAddedStatus['redressal_status_from'];
        }
        $updateArray['redressal_status']= $status;


        DB::table('complaints')
            ->where('id', $complaint_id)
            ->update($updateArray);
//            ->update(['redressal_status' => $status]);

//        create logs here
//        id,$complaint_id,status,changed_by,changed_at
        $log = array(
            'complaint_id' => $complaint_id,
            'redressal_status_from' => $status_from,
            'redressal_status' => $status,
            'remarks' => $remarks,
            'created_by' => Auth::user()->id,
        );
//        inserting into complain logs to create logs for complain redressal
        $logs = ComplaintLogs::create($log);

        $translation_message = '';
        if($status_from == 5){
            $translation_message = 'translated and ';
        }
        if ($status == 5) {
            $comlaint_forwaded_to = 'forwarded to Translator';
        } else if ($status == 0) {
            $comlaint_forwaded_to = 'forwarded to Evaluator';
        } else if ($status == 1) {
            $comlaint_forwaded_to = 'forwarded to Incharge';
        } else if ($status == 2) {
            $comlaint_forwaded_to = 'forwarded to Closer';
        } else if ($status == 4) {
            $comlaint_forwaded_to = 'Rejected';
        }
        Session::flash('success', 'Complain no ' . $complaint_no . ' has been ' .$translation_message. $comlaint_forwaded_to);
        return redirect()->route('complaint_section.index');


    }
    // public function send_remarks(Request $request)
    // {
    //     dd($request->all());
    // }

}
