@extends('layouts.dashboard.main')

@section('content')
    <style type="text/css">
        .form-group {
            border-bottom: 1px solid lightgray;
        }

        label {
            font-weight: 700;
        }
    </style>

    <div class="card yellow_border shadow h-100 py-2">
        <div class="card-body">
            <div class=" row">

                <div class="col-lg-6 col-sm-12 margin-tb pull-left">
                    <h4>Complaint Detail <small>( # {{$complaint[0]['complaint_number']}} )</small></h4>
                </div>
                <div class="col-lg-6 col-sm-12 margin-tb" >
                    <button type="button" class="btn btn-primary" style="float: right"  data-toggle="modal" data-target="#exampleModal">Complain Logs</button>
                </div>
            </div>

            <div class="" style="margin-top: 1%;">

                <div class="form-group row ">
                    <div class="col-md-6 mb-3 mb-sm-0">
                        <label>Name:</label>
                        <p>{{$complaint[0]['name']}}</p>
                    </div>

                    <div class="col-md-6 mb-3 mb-sm-0">
                        <label>Gender:</label>
                        <p>{{$complaint[0]['gender']}}</p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 mb-3 mb-sm-0">
                        <label>Age:</label>
                        <p>{{$complaint[0]['age']}}</p>
                    </div>
                    <div class="col-md-6 mb-3 mb-sm-0">
                        <label>Phone number :</label>
                        <p>+91{{$complaint[0]['phone_number']}}</p>
                    </div>
                </div>
                <div class="form-group  row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Email:</label>
                        <p>{{$complaint[0]['email']}}</p>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Country:</label>
                        <p>{{$complaint[0]['country']}}</p>
                    </div>
                </div>
                @if($complaint[0]['country'] == 'India')
                    <div class="form-group row country_dependent" style="">

                        <div class="col-sm-6 ">
                            <label>State:</label>
                            <p>{{$complaint[0]['state']['name']}}</p>
                        </div>
                        <div class="col-sm-6 country_dependent">
                            <label>District:</label>
                            <p>{{$complaint[0]['district']['name']}}</p>
                        </div>
                    </div>

                    <div class="form-group row country_dependent" id="">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Police Station:</label>
                            <p>{{$complaint[0]['police_station']}}</p>
                        </div>
                        <div class="col-sm-6">
                            <label>Pin Code:</label>
                            <p>{{$complaint[0]['pin_code']}}</p>

                        </div>
                        <div class="col-sm-12">
                            <label>Correspondence Address:</label>
                            <p>{{$complaint[0]['correspondence_address']}}</p>

                        </div>
                    </div>
                @endif
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Complaint Category:</label>
                        <p>{{$complaint[0]['complaint_related_to']}}</p>

                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Are you:</label>
                        <p>{{$complaint[0]['vistim_accused']}}</p>

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Do you have copy of FIR::</label>
                        @if($complaint[0]['fir_copy'] == null)
                            No
                        @else
                            Yes
                        @endif
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Fir Copy::</label>
                        @if($complaint[0]['fir_copy'] == null)
                            No Fir File
                        @else
                            @php
                                $path = storage_path('complaints/fir/' . $complaint[0]['fir_copy']);
                            @endphp
                            <a href="{{asset('storage/complaints/fir/'.$complaint[0]['fir_copy'])}}" target="_blank">
                                Open FIR Copy in next tab</a>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12 mb-6 mb-sm-0">
                        <label>Grievance Lodge : :</label>
                        @if(file_exists(public_path('storage/complaints/grievance/'.$complaint[0]['grievance'])))
                            <a href="{{asset('storage/complaints/grievance/'.$complaint[0]['grievance'])}}"
                               target="_blank">
                                Open Grievance File</a>
                        @else
                            <p>
                                {{$complaint[0]['grievance']}}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="row ">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Your ID for Proof:</label>
                        {{-- <a href="#" target="_blank"> --}}
                        {{-- {{$complaint[0]['id_proof']}} --}}
                        <a href="{{asset('storage/complaints/id_proof/'.$complaint[0]['id_proof'])}}" target="_blank">
                            Open ID Proof</a>
                        {{-- </a> --}}
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Clear face photograpgh:</label>
                        {{-- <a href="#" target="_blank">
                            {{$complaint[0]['photo']}}
                        </a> --}}
                        {{-- <img src="{{asset('storage/complaints/photo/'.$complaint[0]['photo'])}}"> --}}
                        <a href="{{asset('storage/complaints/photo/'.$complaint[0]['photo'])}}" target="_blank">
                            Open Image</a>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Address for Proof:</label>
                        <p>
                            {{$complaint[0]['address_proof']}}
                        </p>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Complaint Confidentiality:</label>
                        <button type="button"
                                class="btn btn-sm btn-success">{{$complaint[0]['confidentiality']}}</button>
                    </div>
                </div>


                <div class="row">

                </div>

                @role('Complaint Status Tranlator')
                <form method="POST" class="redressal_form" action="{{ route('complaint_section.redressal') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-12">
                            <label>Attach Translated Complain:</label>
                            <input id="translated_complain" name="translated_complain" type="file"
                                   class=" form-control "
                                   accept=".doc, .docx, .ppt, .pptx, .pdf"
                                   placeholder="Translated Document of Complain" required>
                        </div>

                        <div class="col-sm-12 my-3">
                            <label>Remarks:</label>
                            <textarea name="redressal_remarks" class="form-control" id="redressal_remarks"
                                      placeholder="Comments(if any)"></textarea>
                            <input type="hidden" name="complaint_no" value="{{$complaint[0]['complaint_number']}}">
                            <input type="hidden" name="complain_id" value="{{$complaint[0]['id']}}">
                            <input type="hidden" id="translator_status" name="status" value="">
                            <input type="hidden" name="status_from" value="5">
                        </div>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-md btn-primary"
                                    onclick="changeStatus(1,'#translator_status')">Send Back
                            </button>
                        </div>
                    </div>

                </form>
                @endrole

                @role('Complaint Evaluator')
                <form method="POST" class="redressal_form" action="{{ route('complaint_section.redressal') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <label>Remarks:</label>
                            <textarea name="redressal_remarks" class="form-control" id="redressal_remarks"
                                      placeholder="Comments(if any)"></textarea>
                            <input type="hidden" name="complaint_no" value="{{$complaint[0]['complaint_number']}}">
                            <input type="hidden" name="complain_id" value="{{$complaint[0]['id']}}">
                            <input type="hidden" id="evaluator_status" name="status" value="">
                            <input type="hidden" name="status_from" value="0">
                        </div>
                        <div class="col-sm-12 mb-3" style="text-align: end">

                            <button type="button" class="btn btn-md btn-primary"
                                    onclick="changeStatus(1,'#evaluator_status')">Send to Incharge
                            </button>
                            <button type="button" class="btn btn-md btn-info"
                                    onclick="changeStatus(5,'#evaluator_status')">Request Translation
                            </button>
                            <button type="button" class="btn btn-md btn-danger"
                                    onclick="changeStatus(4,'#evaluator_status')">Reject Complaint
                            </button>

                        </div>
                    </div>
                </form>
                @endrole
                @role('Complaint Incharge')
                <form method="POST" class="redressal_form" action="{{ route('complaint_section.redressal') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <label>Remarks:</label>
                            <textarea name="redressal_remarks" class="form-control" id="redressal_remarks"
                                      placeholder="Comments(if any)"></textarea>
                            <input type="hidden" name="complaint_no" value="{{$complaint[0]['complaint_number']}}">
                            <input type="hidden" name="complain_id" value="{{$complaint[0]['id']}}">
                            <input type="hidden" id="incharge_status" name="status" value="">
                            <input type="hidden" name="status_from" value="1">
                        </div>
                        <div class="col-sm-12 mb-3" style="text-align: end">

                            <button type="button" class="btn btn-md btn-primary"
                                    onclick="changeStatus(2,'#incharge_status')">Send to Closure
                            </button>
                            <button type="button" class="btn btn-md btn-info"
                                    onclick="changeStatus(5,'#incharge_status')">Request Translation
                            </button>
                            <button type="button" class="btn btn-md btn-danger"
                                    onclick="changeStatus(4,'#incharge_status')">Reject Complaint
                            </button>

                        </div>
                    </div>
                </form>
                @endrole

                @can('Complaint-update')
                    <!-- <hr>
                    <h4>Complaint Response Section</h4>
                    <form method="POST" action="{{ route('complaint_section.store') }}">
                        @csrf
                        <div class=" row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label>Remarks:</label>
                                {{-- <textarea name="remakrs" class="summernote" required></textarea> --}}
                                <textarea name="remakrs" class="form-control" required></textarea>
                            </div>
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label>Complait Status:</label>
                                <select class="form-control " name="status" id="status" required>
                                    <option value="">Select Option</option>
                                    @foreach($complaint_status as $status)
                                        <option value="{{$status->id}}">{{$status->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="complaint_no" value="{{$complaint[0]['complaint_number']}}">
                        <input type="hidden" name="email" value="{{$complaint[0]['email']}}">
                        <input type="hidden" name="name" value="{{$complaint[0]['name']}}">
                        <input type="hidden" name="complaint_id" value="{{$complaint[0]['id']}}">
                        <div class="" style="text-align: right; margin-top: 1%;">
                            <button type="submit" class="btn btn-sm btn-success">Send to Complainant!</button>
                        </div>
                    </form> -->
                @endcan
            </div>

        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">History </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 80%;">
                        <thead>
                            <th>User</th>
                            <th>Sent to</th>
                            <th>Remarks</th>
                        </thead>
                            <tbody>
                            @foreach($complaint_logs as $key=>$value)
                            <tr>
                                <td>{{$value['user']['name']}}({{$redressalStatus[$value['redressal_status_from']]}})</td>
                                <td>{{$redressalStatus[$value['redressal_status']]}}</td>
                                <td>{{$value['remarks']}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('javascript')
    <script type="text/javascript">
        function changeStatus(status, complain_id) {
            if (complain_id == '#translator_status' && document.getElementById("translated_complain").files.length == 0) {
                alert("Please add translated file to continue")
                return false;
            }
            $(complain_id).val(status);
            $('.redressal_form').submit();
        }


        {{--function changeStatusOLD(status, complain_id) {--}}
        {{--    const remarks = document.getElementById("redressal_remarks").value;--}}
        {{--    console.log(remarks);--}}
        {{--    $.ajaxSetup({--}}
        {{--        headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}--}}
        {{--    });--}}
        {{--    var formData = {status: status, complain_id: complain_id, remarks: remarks};--}}
        {{--    var type = "POST";--}}
        {{--    var ajaxurl = "{{route('complaint_section.redressal')}}";--}}

        {{--    $.ajax({--}}
        {{--        type: type,--}}
        {{--        url: ajaxurl,--}}
        {{--        data: formData,--}}
        {{--        dataType: 'json',--}}
        {{--        success: function (response) {--}}
        {{--            window.location.href = "{{URL::to('complaint_section')}}"--}}
        {{--        },--}}
        {{--        error: function (data) {--}}
        {{--            console.log('Error:', data);--}}
        {{--        }--}}
        {{--    });--}}

        {{--}--}}

    </script>
@endsection
