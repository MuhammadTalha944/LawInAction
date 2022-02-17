@extends('layouts.website.app')
@section('title', 'Register Complaint')
@section('content')


<div class="jumbotron text-center">
  <h2>Register Your Complaints</h2>
</div>

<div class="container" style="margin-bottom: 2%;">
  <div class="row">
    <div class="col-sm-12"  >
      <div class="card">
        <h3 style="text-align: left; padding: 2%;">Complaint Form</h3>
        <div class="card-body setup-content" style="padding: 2%;">
            <form method="POST" action="{{ route('complaint.store') }}"  enctype="multipart/form-data" id="form">
              @csrf
                            <div class="other_country">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Name</label>
                                        <input id="name" type="text" class="form-control" name="name"  autocomplete="name"  placeholder="Name" required >
                                    </div>

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label>Gender</label>
                                            <select class="form-control " name="gender"  required>
                                                                    <option value="">Select Gender</option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                </select>
                                        </div>
                                </div>
                               <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Age</label>
                                        <input id="age" type="text" class="form-control" name="age"  autocomplete="age"  placeholder="Age" required>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0 phone_num_error_showing">
                                        <label>Phone number</label>
                                        <input id="phone_number" type="text" 
                                                class="form-control" name="phone_number"  
                                                placeholder="Phone Number" 
                                                required  data-inputmask="'mask': '+999999999999'" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Email</label>
                                        <input id="age" type="email" class="form-control" name="email"  autocomplete="email"  placeholder="Emai" required>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Country</label>
                                        <select class="form-control " name="country"  id="country" required>
                                            <option value="">Select Country</option>
                                            <option value="India">India</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="other_country">
                                    <div class="form-group row country_dependent" style="display: none;">

                                        <div class="col-sm-6 " >

                                                                    <label>State</label>
                                                                    <select class="form-control " name="state"   id="states">
                                                                        <option value="">Select State</option>
                                                                            @foreach($states as $state)
                                                                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                                                            @endforeach
                                                                    </select>

                                                            </div>
                                                            <div class="col-sm-6 country_dependent" style="display: none;">
                                                                <label>District</label>
                                                                    <select class="form-control " name="district"   id="district">
                                                                    </select>

                                                            </div>
                                    </div>
                                    <div class="form-group row country_dependent"  id="" style="display: none;">
                                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                                        <label>Police Station</label>

                                                                        <input id="name" type="text" class="country_dependent_check form-control " name="police_station"
                                                                         placeholder="Police Station">

                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label>Pin Code</label>

                                                                        <input id="name" type="text" class="country_dependent_check form-control " name="pin_code"
                                                                         placeholder="Pin Code">
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <label>Correspondence Address</label>
                                                                        <textarea name="correspondence_address" class="form-control"></textarea>
                                                                    </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label>Your complaint is related to</label>
                                            <select class="form-control " name="complaint_related_to"  required>
                                                <option value="">Select Option</option>
                                                <option value="Communal_Riots">Communal Riots</option>
                                                <option value="Tablighi_Jamaat">Tablighi Jamaat</option>
                                               <option value="Corona_Related">Corona Related</option>
                                                <option value="Personal_Matter">Personal Matter</option>
                                                <option value="Mob_Lynching">Mob Lynching</option>
                                                <option value="Religious_Caste_Discrimination">Religious/Caste Discrimination</option>
                                                <option value="Other_Issues">Other Issues</option>
                                                <option value="Other_Hate_Crimes">Other Hate Crimes</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label>Are you:</label>
                                            <select class="form-control " name="vistim_accused"  id="vistim_accused" required>
                                                <option value="">Select Option</option>
                                                <option value="Victim">Victim</option>
                                                <option value="Accused">Accused</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label>Do you have copy of FIR:</label>
                                            <select class="form-control " name="fir_check"  id="fir_check" required>
                                                <option value="">Select Option</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label>Fir Copy:</label>
                                            <input type="file" disabled name="fir_copy" id="fir_copy" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-6 mb-sm-0">
                                            <label>Lodge your grievance</label>

                                            <br>

                                            <input type="radio" name="grevience" class="grievance_check" value="writing" required>
                                            <label>By Writing Down</label>

                                            <input type="radio" name="grevience" class="grievance_check" value="attach_file" required>
                                            <label>By attaching a file</label>
                                            
                                            <!-- <select class="form-control " name="grevience"  id="grevience" required>
                                                <option value="">Select Option</option>
                                                <option value="writing">By Writing Down</option>
                                                <option value="attach_file">By attaching a file</option>
                                            </select> -->
                                        </div>

                                        <div class="col-sm-6 mb-6 mb-sm-0">
                                            <label>Are you an Indian Citizen:</label>
                                            <select class="form-control " name="citizenship"  id="citizenship" required>
                                                <option value="">Select Option</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row grevience_para" style="display: none;">
                                        <div class="col-sm-12 mb-6 mb-sm-0">
                                            <label>Write down your grievance</label>
                                           <textarea name="grievance" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row grevience_file" style="display: none;">
                                        <div class="col-sm-12 mb-6 mb-sm-0">
                                            <label>Attach a file for grievance</label>
                                            <input type="file" name="grievance_file" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row " >
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label>Your ID for Proof</label>
                                            <input type="file" name="id_proof" class="form-control" required>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label>Clear face photograpgh</label>
                                            <input type="file" name="photo" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label>Your Address for Proof</label>
                                            <input type="file" name="address_proof" class="form-control" required>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                             <label>Complaint Confidentiality</label>
                                            <select class="form-control " name="confidentiality"  id="confidentiality" required>
                                                <option value="">Select Option</option>
                                                <option value="Public">Public</option>
                                                <option value="Private">Private</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row " >
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            {{-- <label>Verify</label> --}}
                                            <input type="checkbox" name="verify" class="" required>
                                            <label> I verify that all of my information is true!</label>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="checkbox" name="concent" class="" required>
                                            <label>I give concent that my information can be used for this complaint.</label>
                                        </div>
                                    </div>


                                    {{--     <hr>
                                    
                                    <h4>
                                            Mobile Verification
                                        </h4>
                                    <div class="form-group row ">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" name="otp_code" class="form-control" required placeholder="OTP Code...">
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                             <a href="#" class="btn btn-primary btn-sm" id="otp_mobile_number">Send OTP Code</a>
                                             <a href="#" class="btn btn-success btn-sm">Verify</a>
                                        </div>
                                    </div>     --}}

                                        <input type="hidden" id="csrf" value="{{Session::token()}}">
                                    <div style="text-align: right;">
                                        <span id="error_show" style="color:Red; display: none;">Highlighted Fields are required</span>
                                     <button type="submit" class="btn btn-yellow submitBtn" style="width: 100%;">Submit</button>
                                  </div>
                                </div>
                            </div>

                            <div class="other_country_text" style="text-align: center; display: none;">
                                <h3>Thank you for approaching us, but currently we are not providing our services outside of India!</h3>
                                <a href="#" class="btn btn-sm btn-success" id="change_country"> Change Country Instead !</a>
                            </div>

              </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('javascript')
<script type="text/javascript">
        $(document).ready(function () {

            $('input').inputmask();
            $("#phone_number").on('keyup', function () {
                if (parseInt(this.value.charAt(1)) === 0) {
                    $('.phone_number_0_error').remove();
                    $('.phone_num_error_showing').append(`<label for="phone_number"
                                                         class="error_others phone_number_0_error"
                                                        style="color:Red">First letter cannot be 0</label>`)
                    $('#phone_number').val('');
                    return false;
                }
            });


            $('#otp_mobile_number').on('click',function(){
                    var mob_num = '+91' + $('#phone_number').val();
                    if($('#phone_number').val().length > 0){
                        alert(mob_num);
                    }else{
                        alert('Pls enter mobile number before receving OTP');
                    }
            })

                CSRF_TOKEN   = "{{ csrf_token() }}";
                $('#country').change(function(){

                    var country = $(this).val();

                    if(country == 'other'){

                            $('.other_country').slideUp();
                            $('.other_country_text').slideDown();
                            $('.country_dependent').slideUp();

                            $('#states').prop("disabled", true);
                            $('#district').prop("disabled", true);

                            $('#states').prop("required", false);
                            $('#district').prop("required", false);
                            $('.country_dependent_check').prop("required", false);

                            $(".form-control ").removeClass("has-error");


                    }else if(country == 'India'){

                            $('.other_country').slideDown();
                            $('.other_country_text').slideUp();

                            $('.country_dependent').slideDown();

                            $('#states').prop("disabled", false);
                            $('#district').prop("disabled", false);

                            $('#states').prop("required", true);
                            $('#district').prop("required", true);
                            $('.country_dependent_check').prop("required", true);

                    }
                });

                $('#change_country').on('click',function(){
                            $('.other_country').slideDown();
                            $('.other_country_text').slideUp();
                            $('#form').trigger("reset");
                });

                  $('#states').change(function(){
                                    var state_id = $(this).val();
                                    $('#district').empty();
                                        $.ajax({
                                            type: "GET",
                                            url: "{{route('get_districts')}}",
                                            data: {_token: CSRF_TOKEN, state_id: state_id},
                                            success: function(response){
                                                var districts = response;
                                                // console.log(response.length);
                                                var result = "<option value=''>Select District</option>";
                                                if(districts.length > 0){
                                                    for(var i =0; i < districts.length ; i++){
                                                        // console.log(districts[i]['id']);
                                                        result += "<option value="+districts[i]['id']+">"+districts[i]['name']+"</option>";
                                                        // console.log(result);
                                                    }
                                                    $('#district').append(result);
                                                }
                                            }
                                        });
                  });
                 $('#fir_check').change(function(){
                        var fir_check = $(this).val();
                        if(fir_check == 'Yes'){
                            $('#fir_copy').prop("disabled", false);
                            $('#fir_copy').prop("required", true);
                        }
                        if(fir_check == 'No'){
                            $('#fir_copy').prop("required", false);
                            $('#fir_copy').prop("disabled", true);
                        }
                  });

                $('.grievance_check').on('click', function(){
                    // var type = $(this).prop('checked');
                    // alert($(this).val());
                    if($(this).val() == 'writing'){
                            $('.grevience_para').slideDown();
                            $('.grevience_file').slideUp();

                            $('.grevience_para').prop('required', true);
                            $('.grevience_file').prop('required', false);
                    }else{
                            $('.grevience_para').slideUp();
                            $('.grevience_file').slideDown();

                            $('.grevience_para').prop('required', false);
                            $('.grevience_file').prop('required', true);
                    }
                })

                 $('#grevience').change(function(){
                        var grevience_check = $(this).val();
                        if(grevience_check == 'writing'){
                            $('.grevience_para').slideDown();
                            $('.grevience_file').slideUp();

                            $('.grevience_para').prop('required', true);
                            $('.grevience_file').prop('required', false);

                        }
                        if(grevience_check == 'attach_file'){
                          $('.grevience_para').slideUp();
                            $('.grevience_file').slideDown();

                            $('.grevience_para').prop('required', false);
                            $('.grevience_file').prop('required', true);

                        }
                  });
              // submitBtn = $('.submitBtn');

              //  submitBtn.click(function(){
              //       var curStep = $(this).closest(".setup-content"),
              //           curStepBtn = curStep.attr("id"),
              //           nextStepWizard = $('.submitBtn'),
              //           curInputs = curStep.find("input,select,textarea"),
              //           isValid = true;

              //       $(".form-control ").removeClass("has-error");
              //       for(var i=0; i<curInputs.length; i++){
              //           if (!curInputs[i].validity.valid){
              //               isValid = false;
              //               $(curInputs[i]).closest(".form-control ").addClass("has-error");
              //               $('#error_show').css('display','block');
              //           }else{
              //               $('#error_show').slideUp();
              //           }
              //       }

              //       if (isValid)
              //           nextStepWizard.removeAttr('disabled').trigger('click');
              //   });





          });
</script>
@endsection
