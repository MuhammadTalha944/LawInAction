@extends('layouts.membership.app')
@section('title', 'Registration')
@section('content')
    @php
        $states = DB::table('states')->get();
        $countries = DB::table('countries')->get();
    @endphp
    <style type="text/css">
        .select2-container {
            width: 100% !important;
        }

        .otp_error { 
            padding: 1%;
            background: rgb(196, 49, 49) none repeat scroll 0% 0%;
            color: white;
            display: block;
            border-radius: 0%;
            margin-top: 2%;
        }
        .backBtn {
            background: #2c2b2e;
            color: white;
            border-radius: 0%; 
        }
    </style>
    <link href="{{asset('dashboard/css/datepicker.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/css/select2.min.css')}}" rel="stylesheet">

    <div class="card o-hidden border-0 shadow-lg" style="font-size: 85% !important">
        <div class="card-body p-0">

            <div class="row">
                <div class="col-lg-3 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-9">
                    <div class="p-5" style="">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Membership Form!</h1>
                        </div>
                        <div class="less_then_18_hide">
                            <div class="stepwizard">
                                <div class="stepwizard-row setup-panel">
                                    <div class="stepwizard-step">
                                        <a href="#step-1" type="button"
                                           class="btn btn-primary btn-circle check_step_click step-1-wizard-button">
                                            <strong><i class="fas fa-arrow-right"></i></strong></a>
                                        <p><strong>Step 1</strong></p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#step-2" type="button"
                                           class="btn btn-default btn-circle check_step_click step-2-wizard-button"
                                           disabled="disabled"><strong>
                                                <i class="fas fa-arrow-right"></i>
                                            </strong></a>
                                        <p><strong>Step 2</strong></p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#step-3" type="button"
                                           class="btn btn-default btn-circle check_step_click step-3-wizard-button"
                                           disabled="disabled"><strong>
                                                <i class="fas fa-arrow-right"></i>
                                            </strong></a>
                                        <p><strong>Step 3</strong></p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#step-4" type="button"
                                           class="btn btn-default btn-circle check_step_click step-4-wizard-button"
                                           disabled="disabled"><strong>
                                                <i class="fas fa-arrow-right"></i>
                                            </strong></a>
                                        <p><strong>Step 4</strong></p>
                                    </div>

                                </div>
                            </div>
                            <form role="form" name="joining_form" id="joining_form" class="user" method="POST"
                                  action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row setup-content" id="step-1">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <label>Name</label>
                                                    <input id="name" type="text"
                                                           class="name form-control @error('name') is-invalid @enderror"
                                                           name="name" value="{{ old('name') }}" autocomplete="name"
                                                           autofocus placeholder="Name" style="text-transform:uppercase"
                                                           title="Name can only have letters, hyphens, periods or space only"
                                                           required>
                                                </div>
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <label>Email</label>
                                                    <input type="text"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           id="email" placeholder="Email" name="email"
                                                           required
                                                           style="text-transform:lowercase;"
                                                    >
                                                </div>
                                            </div>

                                            <div class="form-group row">

                                                <div class="col-sm-6 phone_num_error_showing">
                                                    <label>Mobile Number</label>
                                                    {{-- data-inputmask="'mask': '+9999999999999'" --}}
                                                        <input type="text" class="form-control phone_number"
                                                               id="phone_number" placeholder="Mobile Number"
                                                               name="phone_number"
                                                               value="{{ old('phone_number') }}" required>


                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Gender</label>
                                                    <select class="form-control " name="gender" required>
                                                        <option value="">Select Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                    @error('gender')
                                                    <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">

                                                <div class="col-sm-6">
                                                    <label>Country of Citizenship</label>

                                                    <select class="select2 form-control" name="country"
                                                            id="citizenship_country" required>
                                                        <option value="">Select Country</option>
                                                        @if($countries)
                                                            @foreach($countries as $country)
                                                                <option
                                                                    value="{{$country->country_name}}">{{$country->country_name}}</option>
                                                            @endforeach
                                                            <option value="other">other</option>
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="col-sm-6" style="display: none;" id="oci_selection">
                                                    <label>Are you OCI Card holder?</label>
                                                    <select class="select2 form-control" name="oci_person" id="oci_person">
                                                        <option value="">Select Country</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Country of Residence</label>

                                                    <select disabled class="form-control country_based select2"
                                                            name="residence_country" id="country" required>
                                                        <option value="">Select Country</option>

                                                    </select>
                                                </div>
                                            </div>
                                            {{--  <div class="form-group row">





                                             </div> --}}
                                            <div class="form-group row">
                                                <div class="col-sm-6" style="display: none;" id="nri_selection">
                                                    <label>Are you an NRI?</label>
                                                    <select class="form-control" name="nri_person" id="nri_person">
                                                        <option value="">Select Option</option>
                                                        <option value="Yes">Yes</option>
                                                        <!-- <option value="No">No</option> -->
                                                    </select>
                                                </div>


                                                {{-- <div class="col-sm-4"> --}}
                                                {{-- <label>Country</label>

                                                    <select class="form-control " name="country"  
                                                            id="country" required>
                                                        <option value="">Select Country</option>
                                                        <option value="India">India</option>
                                                        <option value="other">Other</option>
                                                    </select> --}}
                                                {{--  @error('country')
                                                     <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                     </span>
                                                 @enderror --}}
                                                {{-- </div> --}}
                                                <div class="col-sm-6 country_dependent" style="display: none;">

                                                    <label>State</label>
                                                    <select class="form-control " name="state" id="states">
                                                        <option value="">Select State</option>
                                                        @foreach($states as $state)
                                                            <option value="{{$state->id}}">{{$state->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    {{--  @error('states')
                                                         <span class="invalid-feedback" role="alert">
                                                             <strong>{{ $message }}</strong>
                                                         </span>
                                                     @enderror --}}

                                                </div>
                                                <div class="col-sm-6 country_dependent" style="display: none;">
                                                    <label>District</label>
                                                    <select class="form-control  " name="district" id="district">
                                                        {{-- <option value="">Select District</option> --}}
                                                    </select>

                                                </div>
                                                <div class="col-sm-12 country_dependent" style="display: none;">
                                                    <label>Correspondence Address?</label>
                                                    <textarea class="form-control country_dependent_check"
                                                              name="correspondence_address" rows="2"></textarea>
                                                </div>
                                                <div class="col-sm-6  country_dependent" style="display: none;">
                                                    <label>Police Station</label>

<!--                                                     <input id="police_station" type="text"
                                                           class="country_dependent_check form-control "
                                                           name="police_station"
                                                           placeholder="Police Station"> -->
                                                    <select id="police_station"  
                                                            class="country_dependent_check form-control "
                                                            name="police_station"
                                                            placeholder="Police Station">
                                                        <option value="">Select option</option>
                                                        <option value="Testing PS1">Testing PS1</option>
                                                        <option value="Testing PS2">Testing PS2</option>
                                                        <option value="Testing PS3">Testing PS3</option>
                                                        <option value="Testing PS4">Testing PS4</option>
                                                        <option value="Testing PS5">Testing PS5</option>
                                                    </select>

                                                </div>
                                                <div class="col-sm-6 country_dependent" style="display: none;">
                                                    <label>Pin Code</label>

                                                    <input id="pin_code" type="text"
                                                           class="country_dependent_check form-control " name="pin_code"
                                                           placeholder="Pin Code">
                                                    <span id="pin_code_error" style="color: red;"></span>
                                                </div>

                                                <div class="col-sm-6 dob_confirmation">
                                                    <label>Date of Birth</label>
                                                    <!-- .age_confirm -->
                                                    <input type="text" class="form-control age_confirm"
                                                           id="date_of_birth" placeholder="DD/MM/YYYY" name="dob"
                                                           value="{{ old('dob') }}" required>
                                                </div>

                                            </div>
                                            {{--  <div class="form-group row country_dependent"  id="" style="display: none;">


                                                 </div> --}}
                                            <div style="text-align: right;">
                                                <span class="error_report" style="color: red; display: none;">*Please fix errors!</span>
                                                <button
                                                    class="btn btn-yellow btn-user btn-block nextBtn btn-sm pull-right"
                                                    type="button">Next
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row setup-content" id="step-2">
                                    <div class="col-md-12">
                                        <div class="col-md-12">

                                            <div class="lang_wrapper" id="language_selections">
                                                <div class="form-group  row" >
                                                    <div class="col-sm-6">
                                                        <label>Language Known:</label>
                                                        <select class="form-control selected_lang"
                                                                name="lang_selection[]" required>
                                                            <option value="">--Select Option--</option>
                                                            @include('layouts.membership.lang_options')
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <label>Profeciency:</label>
                                                        <select class="form-control " name="lang_profecient[]" id=""
                                                                required>
                                                            <option value="">--Select Option--</option>
                                                            <option value="Native_Bilingual">Native/Bilingual</option>
                                                            <option value="Profecient">Profecient</option>
                                                            <option value="Limited">Limited</option>
                                                            <option value="Basic">Basic</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-1" style="margin-top: 4%;">
                                                        <a href="javascript:void(0)"
                                                           class="btn btn-sm btn-success add_lang">
                                                            <i class="fas fa-plus"></i>
                                                        </a>
                                                    </div>

                                                </div>


                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12 mb-12 mb-sm-0">
                                                    <label>You Are:</label>
                                                    <select class="form-control select2" name="category" id="category"
                                                            required>
                                                        <option value="">--Select Option--</option>
                                                        <option value="Advocate_Lawyer">Advocate/Lawyer</option>
                                                        <option value="Law_Student">Law Student</option>
                                                        <option value="Law_Student_Activist">Activist</option>
                                                        <option value="Journalist">Journalist</option>
                                                        <option value="Writer">Writer</option>
                                                        <option value="Retired_Judge">Retired Judge</option>
                                                        <option value="Retired_Bureaucrat">Retired Bureaucrat</option>
                                                        <option value="Medical_Practitioner">Medical Practitioner
                                                        </option>
                                                        <option value="chartered_Accountant">Chartered Accountant
                                                        </option>
                                                        <option value="cost_accountant">Cost Accountant</option>
                                                        <option value="company_secretary">Company Secrectary</option>
                                                        <option value="Other_Accredited_Person">Other Accredited
                                                            Person
                                                        </option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- Advocate Lawyer --}}
                                            <div id="Advocate_Lawyer" style="display: none;">
                                                <div class="form-group row">
                                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                                        <label>State Bar Council</label>
                                                        {{-- <input id="state_bar_concil" type="text" class=" Advocate_Lawyer_check form-control "
                                                        name="Advocate_Lawyer_police_station"
                                                         placeholder="State Bar Council"> --}}
                                                        <select class="form-control Advocate_Lawyer_check"
                                                                name="Advocate_Lawyer_state_bar_council">
                                                            <option value="">-select option-</option>
                                                            <option value="State_Bar_Council">State Bar Council</option>
                                                        </select>

                                                    </div>
                                                    <div class="col-sm-4 reg_error_double_slashes">
                                                        <label>Registration Number</label>

                                                        <input id="Advocate_Lawyer_pin_code"
                                                               type="text"
                                                               class=" Advocate_Lawyer_check form-control Advocate_Lawyer_pin_code"
                                                               name="Advocate_Lawyer_pin_code"
                                                               placeholder="Registration Number">

                                                    </div>
                                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                                        <label>Registration Date</label>

                                                        <input id="reg_date" type="text"
                                                               class="datepicker Advocate_Lawyer_check form-control"
                                                               name="Advocate_Lawyer_reg_date"
                                                               placeholder="Registration Date">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label>Mainly practice in:</label>
                                                        <select class="Advocate_Lawyer_check select2 form-control"
                                                                name="Advocate_Lawyer_practice_in[]"
                                                                id="Advocate_Lawyer_practice_in" multiple>
                                                            <option value="Supreme_Court">Supreme Court</option>
                                                            <option value="High_Court">High Court</option>
                                                            <option value="District_Court">District Court</option>
                                                            <option value="District_Court">District Court</option>
                                                            <option value="Others">Other</option>
                                                        </select>

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Mainly practicing:</label>
                                                        <select class="Advocate_Lawyer_check select2 form-control "
                                                                name="Advocate_Lawyer_practicing[]"
                                                                id="Advocate_Lawyer_practicing" multiple>
                                                            <option value="Criminal_Law">Criminal Law</option>
                                                            <option value="Family_Law">Family Law</option>
                                                            <option value="Civil_Law">Civil Law</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 Advocate_Lawyer_practice_in_depend"
                                                         style="display:none;">
                                                        <label>Mainly Practicing - Other</label>
                                                        <input id="main_practice_other" type="text"
                                                               class="form-control Advocate_Lawyer_practice_in_other"
                                                               name="Advocate_Lawyer_practice_in_other"
                                                               placeholder="Other...">

                                                    </div>
                                                    <div class="col-sm-6 Advocate_Lawyer_practicing_depend"
                                                         style="display:none;">
                                                        <label>Mainly Practice - Other</label>

                                                        <input id="mainly_practicing_other" type="text"
                                                               class="  form-control Advocate_Lawyer_practicing_other"
                                                               name="Advocate_Lawyer_practicing_other"
                                                               placeholder="Other...">

                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Law_Student_Activist --}}
                                            <div id="Law_Student" style="display: none;">
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label>Tentative date of completion of Law Degree</label>
                                                        <input type="text"
                                                               class="form-control datepicker_law_student Law_Student_check"
                                                               name="tentative_date_of_law_degree">
                                                    </div>

                                                </div>
                                            </div>

                                            {{-- Activist --}}
                                            <div id="Law_Student_Activist" style="display: none;">
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label>Mainly works for:</label>
                                                        <select class="form-control Law_Student_Activist_check select2"
                                                                name="Law_Student_Activist_work" multiple
                                                                id="Law_Student_Activist_check"
                                                        >
                                                            <option value="Legal_reforms">Legal Reforms</option>
                                                            <option value="Human_Rights">Human Rights</option>
                                                            <option value="Civil_Rights">Civil Rights</option>
                                                            <option value="Social_Issues">Social Issues</option>
                                                            <option value="Political_Issues">Political Issues</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-6 Law_Student_Activist_check_depend"
                                                         style="display: none;">
                                                        <label>other:</label>
                                                        <input type="text" name="Law_Student_Activist_work_other"
                                                               class="form-control Law_Student_Activist_work_other">
                                                    </div>

                                                </div>
                                            </div>

                                            {{-- Journalist--}}
                                            <div id="Journalist" style="display: none;">
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <label><b>Journalist:</b></label>
                                                        <select class="Journalist_check form-control select2"
                                                                name="Journalist_work[]" multiple
                                                                id="Journalist_check"
                                                        >
                                                            <option value="">Mainly works for:</option>
                                                            <option value="Print_Media">Print Media</option>
                                                            <option value="Electronic_Media">Electronic Media</option>
                                                            <option value="Online_Media">Online Media</option>
                                                            <option value="Community_Journalism">Community Journalism
                                                            </option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 Journalist_check_depend"
                                                         style="display:none">
                                                        <label>other:</label>
                                                        <input type="text" name="Journalist_work_other"
                                                               class="Journalist_work_other form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Writer--}}
                                            <div id="Writer" style="display: none;">
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label><b>Writer:</b></label>
                                                        <select class="Writer_check form-control select2"
                                                                name="Writer_work" multiple id="Writer_check">
                                                            <option value="">Main domain of wrinting:</option>
                                                            <option value="Legal">Law & Legal Issues</option>
                                                            <option value="Human_Rights">Human Rights</option>
                                                            <option value="Civil_Liberties">Civil Liberties</option>
                                                            <option value="Social_Issues">Social Issues</option>
                                                            <option value="Political_Issues">Political Issues</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 Writer_check_depend">
                                                        <label>other:</label>
                                                        <input type="text" name="Writer_work_other"
                                                               class="form-control Writer_work_other">
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Retired_Judge--}}
                                            <div id="Retired_Judge" style="display: none;">
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label><b>Retired Judge:</b></label>
                                                        <select class="Retired_Judge_check form-control select2"
                                                                name="Retired_Judge_from" id="Retired_Judge_check">
                                                            <option value="">Retired from:</option>
                                                            <option value="Supreme_Court">Supreme Court</option>
                                                            <option value="High_Court">High Court</option>
                                                            <option value="District_Court">District Court</option>
                                                            <option value="National_Tribunal">National Tribunal</option>
                                                            <option value="State_Tribunal">State Tribunal</option>
                                                            <option value="National_Forum">National Forum</option>
                                                            <option value="State_Forum">State Forum</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 Retired_Judge_check_depend"
                                                         style="display:none;">
                                                        <label>other:</label>
                                                        <input type="text" name="Retired_Judge_from_other"
                                                               class="form-control Retired_Judge_from_other">
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Retired_Bureaucrat--}}
                                            <div id="Retired_Bureaucrat" style="display: none;">
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label><b>Retired Bureaucrat:</b></label>
                                                        <select class="Retired_Bureaucrat_check select2 form-control "
                                                                name="Retired_Bureaucrat_as"
                                                                id="Retired_Bureaucrat_check">
                                                            <option value="">Retired as:</option>
                                                            <option value="IAS">IAS</option>
                                                            <option value="IPS">IPS</option>
                                                            <option value="IFS">IFS</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 Retired_Bureaucrat_check_depend"
                                                         style="display:none">
                                                        <label>other:</label>
                                                        <input type="text" name="Retired_Bureaucrat_as_other"
                                                               class="form-control Retired_Bureaucrat_as_other">
                                                    </div>
                                                </div>
                                            </div>


                                            {{-- Medical Practitioner--}}
                                            <div id="medical_practice" style="display: none;">
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label><b>You are:</b></label>
                                                        <select class="medical_practice form-control select2"
                                                                name="medical_practitioner_as"
                                                                id="medical_practicing">
                                                            <option value="">Select option</option>
                                                            <option value="Anesthesiologist">Anesthesiologist</option>
                                                            <option value="Cardiologist">Cardiologist</option>
                                                            <option value="Dentist">Dentist</option>
                                                            <option value="Dermatologist">Dermatologist</option>
                                                            <option value="Endocrinologist">Endocrinologist</option>
                                                            <option value="Gastroenterologist">Gastroenterologist
                                                            </option>
                                                            <option value="General Physician">General Physician</option>
                                                            <option value="General-Surgeon">General-Surgeon</option>
                                                            <option value="Geneticist">Geneticist</option>
                                                            <option value="Gynecologist">Gynecologist</option>
                                                            <option value="Hematologist">Hematologist</option>
                                                            <option value="Nephrologist">Nephrologist</option>
                                                            <option value="Neurologist">Neurologist</option>
                                                            <option value="Oncologist">Oncologist</option>
                                                            <option value="Ophthalmologist">Ophthalmologist</option>
                                                            <option value="Otolaryngologist">Otolaryngologist</option>
                                                            <option value="Pathologist">Pathologist</option>
                                                            <option value="Pediatrician">Pediatrician</option>
                                                            <option value="Pharmacist">Pharmacist</option>
                                                            <option value="Plastic-Surgeon">Plastic-Surgeon</option>
                                                            <option value="Psychiatrist">Psychiatrist</option>
                                                            <option value="Psychologist">Psychologist</option>
                                                            <option value="Pulmonologist">Pulmonologist</option>
                                                            <option value="Radiologist">Radiologist</option>
                                                            <option value="Rheumatologist">Rheumatologist</option>
                                                            <option value="Urologist">Urologist</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 medical_practice_depend" style="display:none">
                                                        <label>other:</label>
                                                        <input type="text" name="medical_practitioner_as_other"
                                                               class="form-control medical_practitioner_as_other">
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="other" style="display: none;">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label>Other</label>
                                                        <input type="text" name="other_option_seleted"
                                                               class="other_option_seleted form-control">
                                                    </div>
                                                </div>
                                            </div>


                                            <div style="text-align: right;">
                                                <span class="error_report" style="color: red; display: none;">*Please fix errors!</span>
                                                <button
                                                    class="btn btn-yellow btn-user btn-block nextBtn btn-sm pull-right"
                                                    type="button">Next
                                                </button>
                                                <button class="btn btn-block backBtn btn-sm pull-right " onclick="back('step-1','step-2')" type="button">Back</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row setup-content" id="step-3">
                                    <div class="col-md-12" style="padding: 2%;">
                                        <span>Choose the best roles according to your qualification and knowledge by which you can serve our cause and rate yourself atleast 7 out of 10 in it:</span>
                                        <hr>
                                        <div class="form-group row">
                                            
                                            <span class="my_qualification_Error" style="color:red; display:none;">
                                                    You must need to select atleast one role according to your qualification
                                            </span>

                                            <div class="col-sm-12">
                                                <label><b>Legal Domain:</b></label>
                                                <input type="checkbox" name="legal_domain" value="legal_domain"
                                                       class="my_qualification un_checked_qualification legal_domain_parent"
                                                >
                                                &nbsp;&nbsp;

                                                <label><b>Content Writing:</b></label>
                                                <input type="checkbox" name="content_writing" value="content_writing"
                                                       class="my_qualification un_checked_qualification content_writing_parent"
                                                >
                                                &nbsp;&nbsp;

                                                <label><b>Journalistic Work:</b></label>
                                                <input type="checkbox" name="journal_work" value="journal_work"
                                                       class="journal_work_parent my_qualification un_checked_qualification"
                                                >
                                                &nbsp;&nbsp;

                                                <label><b>Fund Raising:</b></label>
                                                <input type="checkbox" name="fund_raising" value="fund_raising"
                                                       class="fund_raising_parent my_qualification un_checked_qualification"
                                                >
                                                &nbsp;&nbsp;<br>


                                                <label><b>Social Media Mobilization:</b></label>
                                                <input type="checkbox" name="social_media_mobilization"
                                                       value="social_media_mobilization"
                                                       class="my_qualification un_checked_qualification"
                                                >
                                                &nbsp;&nbsp;


                                                <label><b>General Administration:</b></label>
                                                <input type="checkbox" name="general_admin" value="general_admin"
                                                       class="my_qualification un_checked_qualification"
                                                >
                                                &nbsp;&nbsp;


                                                <label><b>Information Technology:</b></label>
                                                <input type="checkbox" name="info_tech" value="info_tech"
                                                       class="info_tech_parent my_qualification un_checked_qualification"
                                                >
                                                &nbsp;&nbsp;

                                                <label><b>Accounts:</b></label>
                                                <input type="checkbox" name="accounts" value="accounts"
                                                       class="accounts_parent my_qualification un_checked_qualification"
                                                >
                                                &nbsp;&nbsp;


                                                <label><b>Compliances:</b></label>
                                                <input type="checkbox" name="complainces" value="complainces"
                                                       class="complainces_parent my_qualification un_checked_qualification"
                                                >
                                                &nbsp;&nbsp;


                                                <label><b>Expert Opinion:</b></label>
                                                <input type="checkbox" name="expert_opinion" value="expert_opinion"
                                                       class="expert_opinion_parent my_qualification un_checked_qualification"
                                                >
                                                &nbsp;&nbsp;

                                                <label><b>Other:</b></label>
                                                <input type="checkbox" name="other" value="other"
                                                       class="other_parent my_qualification un_checked_qualification"
                                                >
                                                &nbsp;&nbsp;


                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 legal_domain_details" id="legal_domain"
                                                 style="display: none;">
                                                <div class="col-sm-12" style="padding: 2%; border: 1px solid black;">
                                                    <h2>Legal Domain</h2>
                                                    <label class="legal_domain_error"><b>Select Option:</b>

                                                    </label><br>

                                                    <label style="display: none;"
                                                           class="country_dependent"><b>Advocate:</b></label>
                                                    <input type="checkbox" name="advocate" value="advocate"
                                                           style="display: none;"
                                                           class="country_dependent legal_domain_options"
                                                    >
                                                    &nbsp;&nbsp;
                                                    <label><b>Legal Consultant:</b></label>
                                                    <input type="checkbox" name="legal_consultant"
                                                           value="legal_consultant"
                                                           class="legal_domain_options"
                                                    >
                                                    &nbsp;&nbsp;
                                                    <label><b>Legal Research:</b></label>
                                                    <input type="checkbox" name="legal_research" value="legal_research"
                                                           class="legal_domain_options"
                                                    >
                                                    &nbsp;&nbsp;
                                                    <label><b>Legal drafting:</b></label>
                                                    <input type="checkbox" name="legal_drafting" value="legal_drafting"
                                                           class="legal_domain_options"
                                                    >
                                                    &nbsp;&nbsp;
                                                    <label><b>Language Translator:</b></label>
                                                    <input type="checkbox" name="language_translator"
                                                           value="language_translator"
                                                           class="legal_domain_options"
                                                    >
                                                    &nbsp;&nbsp;

                                                    <label style="display: none;" class="country_dependent"><b>Arbitrator
                                                            & Consiliator:</b></label>
                                                    <input type="checkbox" name="arb_consi" value="arb_consi"
                                                           style="display: none;"
                                                           class="country_dependent legal_domain_options"
                                                    >
                                                    &nbsp;&nbsp;
                                                    <label><b>other:</b></label>
                                                    <input type="checkbox" name="legal_" value="legal_other"
                                                           class="legal_domain_options"
                                                    >
                                                    &nbsp;&nbsp;
                                                    <div class="col-sm-12 " id="other_legal_domain"
                                                         style="display: none;">
                                                        <label>Other Legal Domain</label>
                                                        <input type="text" class="" name="other_legak_domain">
                                                    </div>


                                                    <div class="col-sm-12 " style="">

                                                        <div id="legal_drafting_legal_domain"
                                                             style="display: none; border: 1px solid;padding: 1%;margin: 1%;">
                                                            <h5>Legal Drafting Options : </h5>
                                                            <label>Criminal Side Drafting</label>
                                                            <input type="checkbox" class="legal_drafting_options"
                                                                   name="criminal_side_draft"
                                                                   value="criminal_side_draft"
                                                            >
                                                            <label>Legal Side Drafting</label>
                                                            <input type="checkbox" class="legal_drafting_options"
                                                                   name="legal_side_draft"
                                                                   value="legal_side_draft"
                                                            >
                                                            <label>Other</label>
                                                            <input type="checkbox" class="legal_drafting_options"
                                                                   name="other_side_draft"
                                                                   value="other_side_draft"
                                                            >

                                                            <div id="legal_drafting_other" style="display: none;">
                                                                <label>Other - Legal Drafting Options : </label>
                                                                {{-- <label>Criminal Side Drafting</label> --}}
                                                                <input type="text" class="" name="legal_drafting_other">
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="trans_lang_wrapper">
                                                        <div class="form-group  row" id="legal_domain_lang_translator"
                                                             style="display: none;">
                                                            <div class="col-sm-6">
                                                                <label>From Language:</label>
                                                                <select class="form-control selected_lang_2nd_step" name="from_lang_trans[]"
                                                                        id="">
                                                                    
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <label>To Language:</label>
                                                                <select class="form-control selected_lang_2nd_step" name="to_lang_trans[]"
                                                                        id="">
                                                                   
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-1" style="margin-top: 4%;">
                                                                <a href="javascript:void(0)"
                                                                   class="btn btn-sm btn-success trans_lang"><i
                                                                        class="fa fa-plus"></i></a>
                                                            </div>

                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="col-sm-12 content_writing_details" id="content_writing"
                                                 style="display: none;">

                                                <div class="col-sm-12" style="padding: 2%; border: 1px solid black;">
                                                    <h2>Content Writing</h2>
                                                    <label class="content_writing_error"><b>Select Option:</b></label><br>

                                                    <label><b>Content Writer:</b></label>
                                                    <input type="checkbox" name="content_writer" value="content_writer"
                                                           class="content_writing_options"
                                                    >
                                                    &nbsp;&nbsp;
                                                    <label><b>Content Editor:</b></label>
                                                    <input type="checkbox" name="content_editor" value="content_editor"
                                                           class="content_writing_options"
                                                    >
                                                    &nbsp;&nbsp;
                                                    <label><b>Research & Fact Check:</b></label>
                                                    <input type="checkbox" name="research_fact_check"
                                                           value="research_fact_check"
                                                           class="content_writing_options"
                                                    >
                                                    &nbsp;&nbsp;
                                                    <label><b>Language Translator:</b></label>
                                                    <input type="checkbox" name="content_writer_lang_trans"
                                                           value="content_writer_lang_trans"
                                                           class="content_writing_options"
                                                    >
                                                    &nbsp;&nbsp;
                                                    <label><b>Other:</b></label>
                                                    <input type="checkbox" name="other" value="other"
                                                           class="content_writing_options"
                                                    >
                                                    &nbsp;&nbsp;

                                                    <div class="col-sm-12 " style="">

                                                        <div id="content_writer_content_writing"
                                                             style="display: none;border: 1px solid;padding: 1%;margin: 1%;">
                                                            <h5>Content Writer Options : </h5>
                                                            <label>Law & Legal Cases</label>
                                                            <input type="checkbox" class="legal_drafting_options"
                                                                   name="law_legal_content_writing"
                                                                   value="law_legal_content_writing"
                                                            >&nbsp;&nbsp;
                                                            <label>Human Rights</label>
                                                            <input type="checkbox" class="legal_drafting_options"
                                                                   name="human_rights_content_writing"
                                                                   value="human_rights_content_writing"
                                                            >&nbsp;&nbsp;
                                                            <label>Civil Rights</label>
                                                            <input type="checkbox" class="legal_drafting_options"
                                                                   name="civil_rights_content_writing"
                                                                   value="civil_rights_content_writing"
                                                            >&nbsp;&nbsp;
                                                            <label>Social Issues</label>
                                                            <input type="checkbox" class="legal_drafting_options"
                                                                   name="social_issues_content_writing"
                                                                   value="social_issues_content_writing"
                                                            >&nbsp;&nbsp;

                                                            <label>Political Issues</label>
                                                            <input type="checkbox" class="legal_drafting_options"
                                                                   name="political_issues_content_writing"
                                                                   value="political_issues_content_writing"
                                                            >&nbsp;&nbsp;

                                                            <label>other</label>
                                                            <input type="checkbox"
                                                                   class="legal_drafting_options other_content_writing"
                                                                   name="other_content_writing"
                                                                   value="other_content_writing"
                                                            >&nbsp;&nbsp;
                                                            <div id="other_law_legal_content" style="display: none;">
                                                                <label>Other - Law and Legal Content : </label>
                                                                <input type="text" class=""
                                                                       name="other_law_legal_content">
                                                            </div>
                                                        </div>

                                                        <div id="other_content_writer" style="display: none;">
                                                            <label>Other - Content Writing Option : </label>
                                                            {{-- <label>Write your option</label> --}}
                                                            <input type="text" class="" name="content_writing_other">
                                                        </div>

                                                    </div>
                                                    <div class="trans_lang_cw_wrapper">
                                                        <div class="form-group  row" id="content_writer_lang"
                                                             style="display: none;">
                                                            <div class="col-sm-6">
                                                                <label>From Language:</label>
                                                                <select class="form-control selected_lang_2nd_step"
                                                                        name="from_lang_trans_cw[]" id="">
                                                                  
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <label>To Language:</label>
                                                                <select class="form-control selected_lang_2nd_step" 
                                                                        name="to_lang_trans_cw[]"   id="">
                                                                   
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-1" style="margin-top: 4%;">
                                                                <a href="javascript:void(0)"
                                                                   class="btn btn-sm btn-success trans_lang_cw"><i
                                                                        class="fa fa-plus"></i></a>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-12 journal_work_details" id="journal_work"
                                                 style="display: none;">
                                                <div class="" style="padding: 1%; border: 1px solid black;">
                                                    <h2>Journalistic Work</h2>
                                                    <label class="journal_work_error"><b>Select Optios:</b></label><br>

                                                    <label>News Reporter</label>
                                                    <input type="checkbox" name="journal_work_news_reporter"
                                                           value="journal_work_news_reporter"
                                                           class="journal_work_options">
                                                    &nbsp;&nbsp;&nbsp;
                                                    <label>News Editor</label>
                                                    <input type="checkbox" name="journal_work_news_editor"
                                                           value="journal_work_news_editor"
                                                           class="journal_work_options">
                                                    &nbsp;&nbsp;&nbsp;
                                                    <label>Researcha nd Fact Check</label>
                                                    <input type="checkbox" name="journal_work_research_n_fact_checker"
                                                           value="journal_work_research_n_fact_checker"
                                                           class="journal_work_options">
                                                    &nbsp;&nbsp;&nbsp;
                                                    <label>Language Translator</label>
                                                    <input type="checkbox" name="journal_work_lang_translator"
                                                           value="journal_work_lang_translator"
                                                           id="journal_work_lang_translator"
                                                           class="journal_work_lang_translator 
                                                           journal_work_options"
                                                    >
                                                    &nbsp;&nbsp;&nbsp;<br>
                                                    <label>Anchor/presenter</label>
                                                    <input type="checkbox" name="journal_work_anchor_presenter"
                                                           value="journal_work_anchor_presenter"
                                                           class="journal_work_options" 
                                                           >
                                                    &nbsp;&nbsp;&nbsp;
                                                    <label>Video Editor</label>
                                                    <input type="checkbox" name="journal_work_video_editor"
                                                           value="journal_work_video_editor"
                                                           class="journal_work_video_editor
                                                           journal_work_options
                                                           ">
                                                    &nbsp;&nbsp;&nbsp;
                                                    <label class="country_dependent" style="display: none;">Camera
                                                        Operator</label>
                                                    <input type="checkbox" name="journal_work_camera_operator"
                                                           value="journal_work_camera_operator"
                                                           class="country_dependent journal_work_options" style="display: none;">
                                                    &nbsp;&nbsp;&nbsp;
                                                    <label>Graphic Designer</label>
                                                    <input type="checkbox" name="journal_work_graphic_Designer"
                                                           value="journal_work_graphic_Designer"
                                                           class="journal_work_graphic_Designer journal_work_options">
                                                    &nbsp;&nbsp;&nbsp;

                                                    <label>Other</label>
                                                    <input type="checkbox" name="journal_work_other"
                                                           value="journal_work_other" class="journal_work_other journal_work_options"
                                                           id="journal_work_other">
                                                    &nbsp;&nbsp;&nbsp;

                                                    <div class="journal_work_other_write" style="display: none;">
                                                        <label>Other - Journalistic Work</label>
                                                        <input type="text" class="journal_work_other_write"
                                                               name="journal_work_other_write"
                                                               value="">
                                                    </div>

                                                    <div class="trans_lang_jw_wrapper">
                                                        <div class="form-group  row" id="journalistic_Work_lang"
                                                             style="display: none;">
                                                            <div class="col-sm-6">
                                                                <label>From Language:</label>
                                                                <select class="form-control selected_lang_2nd_step"
                                                                        name="from_lang_trans_jw[]" id="">
                                                                   
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <label>To Language:</label>
                                                                <select class="form-control selected_lang_2nd_step" 
                                                                        name="to_lang_trans_jw[]"   id="">
                                                                    
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-1" style="margin-top: 4%;">
                                                                <a href="javascript:void(0)"
                                                                   class="btn btn-sm btn-success trans_lang_jw"><i
                                                                        class="fa fa-plus"></i></a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 fund_raising_details" id="fund_raising"
                                                 style="display: none;">
                                                <div class="" style="padding: 1%; border: 1px solid black;">
                                                    <h2>Fund Raising</h2>
                                                    <label class="fund_raising_error"><b>Select Optios:</b></label><br>

                                                    <label>Community Fundraiser</label>
                                                    <input type="checkbox" name="fund_raising_community_fund_raiser"
                                                           class="fund_raising_options" 
                                                           value="fund_raising_community_fund_raiser">
                                                    &nbsp;&nbsp;&nbsp;

                                                    <label>Online Fundraiser</label>
                                                    <input type="checkbox" name="fund_raising_online_fund_raiser"
                                                           class="fund_raising_options" 
                                                           value="fund_raising_online_fund_raiser">
                                                    &nbsp;&nbsp;&nbsp;


                                                    <label>Institutional Partnership</label>
                                                    <input type="checkbox" name="fund_raising_institutional_partnership"
                                                           class="fund_raising_options" 
                                                           value="fund_raising_institutional_partnership">
                                                    &nbsp;&nbsp;&nbsp;


                                                    <label>Social Media Influencer</label>
                                                    <input type="checkbox" name="fund_raising_social_media_influencer"
                                                           class="fund_raising_options" 
                                                           value="fund_raising_social_media_influencer">
                                                    &nbsp;&nbsp;&nbsp;


                                                    <label>Story Writer</label>
                                                    <input type="checkbox" name="fund_raising_story_writer"
                                                           class="fund_raising_options" 
                                                           value="fund_raising_story_writer">
                                                    &nbsp;&nbsp;&nbsp;

                                                    <label>Proofreader</label>
                                                    <input type="checkbox" name="fund_raising_proofreader"
                                                           class="fund_raising_options" 
                                                           value="fund_raising_proofreader">
                                                    &nbsp;&nbsp;&nbsp;


                                                    <label>Language Translator</label>
                                                    <input type="checkbox" name="fund_raising_lang_translator"
                                                           value="fund_raising_lang_translator"
                                                           id="fund_raising_lang_translator"
                                                           class="fund_raising_lang_translator fund_raising_options"
                                                    >

                                                    <label>Other</label>
                                                    <input type="checkbox" name="fund_raising_work_other"
                                                           value="fund_raising_work_other"
                                                           class="fund_raising_work_other fund_raising_options" id="fund_raising_work_other">
                                                    &nbsp;&nbsp;&nbsp;

                                                    <div class="fund_raiser_other_write" id="fund_raiser_other_write"
                                                         style="display: none;">
                                                        <label>Other - Fundraising</label>
                                                        <input type="text" class="fund_raiser_other_write"
                                                               name="fund_raiser_other_write"
                                                               value="">
                                                    </div>

                                                    <div class="trans_lang_fw_wrapper">
                                                        <div class="form-group  row" id="fundraising_Work_lang"
                                                             style="display: none;">
                                                            <div class="col-sm-6">
                                                                <label>From Language:</label>
                                                                <select class="form-control "
                                                                        name="from_lang_trans_fw[]" id="">
                                                                    <option value="">--Select Option--</option>
                                                                    <option value="English">Enlgish</option>
                                                                    <option value="Urdu">Urdu</option>
                                                                    <option value="Hindi">Hindi</option>
                                                                    <option value="Punjabi">Punjabi</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <label>To Language:</label>
                                                                <select class="form-control " name="to_lang_trans_fw[]"
                                                                        id="">
                                                                    <option value="">--Select Option--</option>
                                                                    <option value="English">Enlgish</option>
                                                                    <option value="Urdu">Urdu</option>
                                                                    <option value="Hindi">Hindi</option>
                                                                    <option value="Punjabi">Punjabi</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-1" style="margin-top: 4%;">
                                                                <a href="javascript:void(0)"
                                                                   class="btn btn-sm btn-success trans_lang_fw"><i
                                                                        class="fa fa-plus"></i></a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 info_tech_details" id="info_tech"
                                                 style="display: none;">
                                                <div class="" style="padding: 1%; border: 1px solid black;">
                                                    <h2>Information Technology</h2>
                                                    <label class="info_tech_error"><b>Select Optios:</b></label><br>

                                                    <label>Web Admin/Editor</label>
                                                    <input type="checkbox" name="information_technology_web_admin"
                                                           class="info_tech_options" 
                                                           value="information_technology_web_admin">
                                                    &nbsp;&nbsp;&nbsp;

                                                    <label>Server Administrator</label>
                                                    <input type="checkbox" name="information_technology_server_admin"
                                                           class="info_tech_options" 
                                                           value="information_technology_server_admin">
                                                    &nbsp;&nbsp;&nbsp;

                                                    <label>Web Developer</label>
                                                    <input type="checkbox" name="information_technology_web_developer"
                                                           class="info_tech_options" 
                                                           value="information_technology_web_developer">
                                                    &nbsp;&nbsp;&nbsp;

                                                    <label>Graphic Designer</label>
                                                    <input type="checkbox"
                                                           name="information_technology_graphic_designer"
                                                           class="info_tech_options" 
                                                           value="information_technology_graphic_designer">
                                                    &nbsp;&nbsp;&nbsp;

                                                    <label>Other</label>
                                                    <input type="checkbox" name="information_tech_work_other"
                                                           value="information_tech_work_other"
                                                           class="information_tech_work_other info_tech_options"
                                                           id="information_tech_work_other">
                                                    &nbsp;&nbsp;&nbsp;

                                                    <div class="info_tech_other_write" id="info_tech_other_write"
                                                         style="display: none;">
                                                        <label>Other - Information Technology</label>
                                                        <input type="text" class="info_tech_other_write"
                                                               name="info_tech_other_write" id="info_tech_other_write">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-12 accounts_details " id="accounts"
                                                 style="display: none;">

                                                <div class="" style="padding: 1%; border: 1px solid black;">
                                                    <h2>Accounts</h2>
                                                    <label class="accounts_error"><b>Select Optios:</b></label><br>

                                                    <label>Charterd Accountant</label>
                                                    <input type="checkbox" id="accounts_chartard_Accountant"
                                                           name="accounts_chartard_Accountant"
                                                           value="accounts_chartard_Accountant"
                                                           class="accounts_options" 
                                                           >
                                                    &nbsp;&nbsp;&nbsp;

                                                    <label>Cost Accountant</label>
                                                    <input type="checkbox" id="accounts_Cost_Accountant"
                                                           name="accounts_Cost_Accountant"
                                                           value="accounts_Cost_Accountant"
                                                           class="accounts_Cost_Accountant accounts_options">
                                                    &nbsp;&nbsp;&nbsp;

                                                    <label>General Accountancy</label>
                                                    <input type="checkbox" name="accounts_General_Accountancy"
                                                           value="accounts_General_Accountancy"
                                                           class="accounts_options" 
                                                           >
                                                    &nbsp;&nbsp;&nbsp;

                                                    <label>Other</label>
                                                    <input type="checkbox" name="accounts_work_other"
                                                           value="accounts_work_other" class="accounts_work_other accounts_options"
                                                           id="accounts_work_other">
                                                    &nbsp;&nbsp;&nbsp;

                                                    <div class="accounts_other_write" id="accounts_other_write"
                                                         style="display: none;">
                                                        <label>Other - Accounts</label>
                                                        <input type="text" class="accounts_other_write"
                                                               name="accounts_other_write" id="accounts_other_write">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-12 complainces_details" id="complainces"
                                                 style="display: none;">
                                                <div class="" style="padding: 1%; border: 1px solid black;">
                                                    <h2>Complainces</h2>
                                                    <label class="complainces_error"><b>Select Optios:</b></label><br>

                                                    <label class="country_dependent" style="display: none;">Company
                                                        Secertary</label>
                                                    <input class="country_dependent complainces_options" style="display: none;"
                                                           type="checkbox" id="complainces_company_secretry"
                                                           name="complainces_company_secretry"
                                                           value="complainces_company_secretry">
                                                    &nbsp;&nbsp;&nbsp;


                                                    <label class="country_dependent" style="display: none;">Chartard
                                                        Accountant</label>
                                                    <input class="country_dependent complainces_options" style="display: none;"
                                                           type="checkbox" id="complainces_chartarrd_accountant"
                                                           name="complainces_chartarrd_accountant"
                                                           value="complainces_chartarrd_accountant">
                                                    &nbsp;&nbsp;&nbsp;


                                                    <label class="country_dependent" style="display: none;">Cost
                                                        Accountant</label>
                                                    <input class="country_dependent complainces_options" style="display: none;"
                                                           type="checkbox" id="complainces_cost_accountant"
                                                           name="complainces_cost_accountant"
                                                           value="complainces_cost_accountant">
                                                    &nbsp;&nbsp;&nbsp;


                                                    <label>Other</label>
                                                    <input type="checkbox" name="complainces_other complainces_options"
                                                           value="complainces_other" class="complainces_other"
                                                           id="complainces_other">
                                                    &nbsp;&nbsp;&nbsp;

                                                    <div class="complainces_other_write" id="complainces_other_write"
                                                         style="display: none;">
                                                        <label>Other - Compliances</label>
                                                        <input type="text" class="complainces_other_write"
                                                               name="complainces_other_write"
                                                               id="complainces_other_write">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 expert_opinion_details" id="expert_opinion"
                                                 style="display: none;">
                                                <div class="" style="padding: 1%; border: 1px solid black;">
                                                    <h2>Expert Opinion</h2>
                                                    <label class="expert_opinion_error"><b>Select Optios:</b></label><br>

                                                    <label>Medical Practitioner</label>
                                                    <input type="checkbox" id="expert_op_medical_practice"
                                                           name="expert_op_medical_practice"
                                                           value="expert_op_medical_practice"
                                                           class="expert_opinion_options" 
                                                           >
                                                    &nbsp;&nbsp;&nbsp;


                                                    <label class="country_dependent" style="display: none;">Company
                                                        Secertary</label>
                                                    <input class="country_dependent expert_opinion_options" style="display: none;"
                                                           type="checkbox" id="expert_op_company_secretry"
                                                           name="expert_op_company_secretry"
                                                           value="expert_op_company_secretry">
                                                    &nbsp;&nbsp;&nbsp;


                                                    <label class="country_dependent" style="display: none;">Chartard
                                                        Accountant</label>
                                                    <input class="country_dependent expert_opinion_options" style="display: none;"
                                                           type="checkbox" id="expert_op_chartarrd_accountant"
                                                           name="expert_op_chartarrd_accountant"
                                                           value="expert_op_chartarrd_accountant">
                                                    &nbsp;&nbsp;&nbsp;


                                                    <label class="country_dependent" style="display: none;">Cost
                                                        Accountant</label>
                                                    <input class="country_dependent expert_opinion_options" style="display: none;"
                                                           type="checkbox" id="expert_op_cost_accountant"
                                                           name="expert_op_cost_accountant"
                                                           value="expert_op_cost_accountant">
                                                    &nbsp;&nbsp;&nbsp;

                                                    <label>Other</label>
                                                    <input type="checkbox" name="expert_op_other"
                                                           value="expert_op_other" class="expert_op_other expert_opinion_options"
                                                           id="expert_op_other">
                                                    &nbsp;&nbsp;&nbsp;


                                                    <div class="expert_op_other_write" id="expert_op_other_write"
                                                         style="display: none;">
                                                        <label>Other - Expert Opinion</label>
                                                        <input type="text" class="expert_op_other_write"
                                                               name="expert_op_other_write" id="expert_op_other_write">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 other_details" id="other" style="display: none;">
                                                <div class="" style="padding: 1%; border: 1px solid black;">
                                                    <h2>other</h2>
                                                    <label class="other_option_err"><b>Write your answer</b></label><br>
                                                    <input type="text" class="other_option_from_list other_option_val"
                                                           name="other_option_from_list" id="other_option_from_list">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label>Are you a member of any other organization providing free
                                                        legal aid and services?</label>
                                                    <select class="form-control " name="another_membership"
                                                            id="another_membership" required>
                                                        <option value="">Select Option</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Do you have something else <br>to share?</label>
                                                    <select class="form-control " name="something_else_to_share"
                                                            id="something_else_to_share" required>
                                                        <option value="">Select Option</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6" id="organization_name_n_role"
                                                     style="display:none;">
                                                    <label>Please name the organization and<br> your role in it:</label>
                                                    <input class="another_membership_check form-control"
                                                           name="organization_name_n_role"
                                                           placeholder="Organization Name and your Role..."
                                                           id="organization_name_n_role">
                                                </div>
                                                <!-- </div> -->
                                                <!-- <div class="form-group row"> -->

                                                <div class="col-md-6" id="write_something_else_othr"
                                                     style="display:none;">
                                                    <label>Please write down what you have something else to share:</label>
                                                    <input class="write_something_else form-control"
                                                           name="write_something_else"
                                                           placeholder="Write Something Else !"
                                                           id="write_something_else">
                                                </div>
                                            </div>
                                            <div class="form-group row" id="advocate_lawyer_not_selected"
                                                 style="display: none;">
                                                <div class="col-sm-6">
                                                    <label>Any document proving your identity:</label>

                                                    <input id="any_other_doc" type="file" class="
                                                        advocate_lawyer_not_selected_files
                                                     form-control "
                                                           name="proving_your_identity"
                                                           placeholder="Document for Identity">

                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Your passport size photograph:</label>

                                                    <input id="passport_size_pic" type="file" class="
                                                        advocate_lawyer_not_selected_files
                                                     form-control "
                                                           name="passport_photo"
                                                    >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6" id="advocate_lawyer_file" style="display: none;">
                                                    <label>Copy of valid license to practice law(Bar Concil ID Card,
                                                        etc):</label>

                                                    <input id="valid_id" type="file" class=" form-control "
                                                           name="passport_photo"
                                                           placeholder="Pin Code">
                                                </div>
                                            </div>
                                            <div style="text-align: right;">
                                                <span class="error_report" style="color: red; display: none;">*Please fix errors!</span>
                                                <button
                                                    class="btn btn-yellow btn-user btn-block nextBtn btn-sm pull-right form-3-button"
                                                    type="button">Next
                                                </button>
                                                <button class="btn btn-block backBtn btn-sm pull-right" onclick="back('step-2','step-3')" type="button">Back</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row setup-content" id="step-4">
                                    <div class="col-md-12">
                                        <h4>Consent and Verification</h4>
                                    </div>

                                    <div class="col-md-10"><label>I verify that all the information provided by me
                                            through this form is true andnothing substantial material has been concealed
                                            therefrom.</label></div>
                                    <div class="col-md-2"><label>Yes &nbsp; </label><input type="checkbox"
                                                                                           name="concent_1" required>
                                    </div>


                                    <div class="col-md-10"><label>I give my free consent to be a member of the
                                            organization, and give my consentto use my data within the scope and
                                            objectives of the organization, andconsented to accept all sorts of
                                            communication in this regard.</label></div>
                                    <div class="col-md-2"><label>Yes &nbsp; </label><input type="checkbox"
                                                                                           name="concent_2" required>
                                    </div>


                                    {{-- <div class="col-md-12" id=""> --}}
                                    <div class="col-md-5 otp_verified phone_num_error_showing_otp_section">
                                        <label>Re-enter Mobile No for OTP</label>
                                        <!-- <input type="text" name="mobile_no_for_otp" class="form-control"
                                               id="phone_number_for_otp" required> -->
                                        <input type="text" class="form-control phone_number"
                                                id="phone_number_for_otp" placeholder="Mobile Number"
                                                name="mobile_no_for_otp"
                                                value="{{ old('phone_number') }}" required>
                                    </div>

                                    <div class="col-md-3 otp_verified">
                                        <label>Enter OTP</label>
                                        <input type="number" name="otp_generated" class="form-control" required
                                               id="otp_generated">
                                    </div>

                                    <div class="col-md-4 otp_verified">
                                        <a href="javascript:void(0)" class="btn btn-sm btn-yellow"
                                           style="margin-top: 15%;"
                                           id="send_otp">Send OTP</a>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-success"
                                           style="margin-top: 15%;"
                                           id="verify_otp">Verify OTP</a>
                                    </div>
                                    {{-- </div> --}}
                                    <div class="col-md-12"
                                         style="display: none;"
                                         id="otp_success">
                                        <!-- <p></p> -->
                                        <div class="alert alert-success" role="alert" style="margin-top: 2%;">
                                          Your Mobile Number is Verified
                                        </div>
                                    </div>
                                    <div class="col-md-12"
                                         style="display: none;"
                                         id="otp_error">
                                        <div class="alert alert-danger" role="alert" style="margin-top: 2%;">
                                          Incorrect OTP, Pls enter correct OTP
                                        </div>
                                    </div>

                                    <div class="col-md-12" style="margin-top: 2%;">
                                        <div style="text-align: right;">
                                            <span class="error_report" style="color: red; display: none;">*Highlighted Fields are required!</span>
                                            <button style="display: none;"
                                                    class="submit_btn btn btn-yellow btn-user btn-block nextBtn btn-sm pull-right"
                                                    type="submit">Submit!
                                            </button>
                                            <button class="btn btn-block backBtn btn-sm pull-right" onclick="back('step-3','step-4')" type="button">Back</button>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="text-center less_then_18_hidden" style="display: none;">
                            <h3 class="h4 text-gray-900 mb-4" style="background: #ff6060;">Sorry! Only 18 or greater
                                then 18 years old people can fill this form</h3>
                            <h5 class="h4 text-gray-900 mb-4">
                                <a href="#" id="change_age">Want to update age again?</a>
                            </h5>
                        </div>
                        <hr>
                        <!-- <div class="text-center">
                            <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                        </div> -->
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="text-left">
                                        <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                                    </div>
                                    <div class="text-left">
                                        <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-right">
                                        <a class="small" href="javascript:void(0)">Report an issue</a>
                                    </div>
                                </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

    <script src="{{asset('dashboard/js/jquery.inputmask.bundle.js')}}"></script>
    <script src="{{asset('dashboard/js/select2.min.js')}}"></script>
    <script src="{{asset('dashboard/js/bootstrap-datepicker.js')}}"></script>


    <script type="text/javascript">

        $(document).ready(function () {

            $('.datepicker').datepicker({
                format: 'mm-dd-yyyy',
                endDate: '+0d',
                autoclose: true
            });

            var date = new Date();
            date.setDate(date.getDate() - 1);
            
            var today_s_date = new Date();
            var current_year = today_s_date.getFullYear();
            var nxt_5_year = current_year+5;

            $('.datepicker_law_student').datepicker({
                format: "mm-yyyy",
                startView: "months",
                minViewMode: "months",
                autoclose: true,
                startDate: date,
                changeYear:true,
                yearRange: current_year+":"+nxt_5_year
            });
            console.log(current_year);
            console.log(nxt_5_year);
            

            // $(".age_confirm").on("change", function () {

            //     Swal.fire({
            //         title: 'Is your age equal or greater then 18?',
            //         showDenyButton: true,
            //         confirmButtonText: `Yes`,
            //         denyButtonText: `No`,
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //         } else if (result.isDenied) {
            //             Swal.fire('We are currently enrolling members who are at least 18 years old.', '', 'error');
            //             $('.less_then_18_hide').slideUp();
            //             $('.less_then_18_hidden').slideDown();
            //             $('.age_confirm').val('');
            //             $('input').val('');
            //         }
            //     })
            // });

            $('#change_age').on('click', function () {
                Swal.fire('Your age must be 18 years or greater!', '', 'info');
                $('.less_then_18_hide').slideDown();
                $('.less_then_18_hidden').slideUp();
                $('.age_confirm').val('');
                $('input').val('');
            });

            $('#form-3-button').on('click', function (){
                    console.log("in");
                $('.my_qualification:checkbox:checked');
                    return false;
            });

            $('.select2').select2();


            $("#date_of_birth").datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true,
                endDate: "today"
            }).on('change', function () {

                var 
                birthday = new Date(this.value),
                    today = new Date(),
                    ageInMilliseconds = new Date(today - birthday),
                    years = ageInMilliseconds / (24 * 60 * 60 * 1000 * 365.25);
                
                var selected_years = this.value.slice(-4);
                var age_cal = current_year-selected_years;

                if (age_cal < '18') {
                    Swal.fire({
                        title: 'Your age is less then 18 Years Old!',
                        showDenyButton: true,
                        confirmButtonText: `Change Age Selection`,
                        denyButtonText: `Proceed`,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('.age_confirm').val('');
                        } else if (result.isDenied) {
                            Swal.fire('We are currently enrolling members who are at least 18 years old.', '', 'error');
                            $('.less_then_18_hide').slideUp();
                            $('.less_then_18_hidden').slideDown();
                            $('.age_confirm').val('');
                            $('input').val('');
                        }
                    });
                    // Swal.fire('We are currently enrolling members who are at least 18 years old.', '', 'error');
                    // $('.less_then_18_hide').slideUp();
                    // $('.less_then_18_hidden').slideDown();
                    // $('.age_confirm').val('');
                    // $('input').val('');

                }

            });

            function getAge(dateVal) {
                var
                    birthday = new Date(dateVal.value),
                    today = new Date(),
                    ageInMilliseconds = new Date(today - birthday),
                    years = ageInMilliseconds / (24 * 60 * 60 * 1000 * 365.25),
                    months = 12 * (years % 1),
                    days = Math.floor(30 * (months % 1));
                    
                    // alert(years);
                    return false;

                // return Math.floor(years) + ' years ' + Math.floor(months) + ' months ' + days + ' days';
                return years;

            }

            $('input').inputmask();
            $("#phone_number").on('keyup', function () {
                if (parseInt(this.value.charAt(1)) === 0) {
                    $('.phone_number_0_error').remove();

                    // alert('First letter can not be  "0" ');
                    // $('.phone_number_error').css('display','block');
                    // $('.phone_number_0_error').css('display','block');
                    $('.phone_num_error_showing').append(`<label for="phone_number"
                                                         class="error_others phone_number_0_error"
                                                        style="color:Red">First letter cannot be 0</label>`)
                    $('#phone_number').val('');
                    return false;
                } else if (parseInt(this.value.charAt(1)) === 1) {
                    $('.phone_number_0_error').remove();
                    var maskuse = "+99999999999"
                    $("#phone_number").inputmask("mask", {"mask": maskuse});
                } else if (parseInt(this.value.charAt(1)) === 4 && parseInt(this.value.charAt(2)) === 4) {
                    $('.phone_number_0_error').remove();
                    var maskuse = "+999999999999"

                    $("#phone_number").inputmask("mask", {"mask": maskuse});
                } else if (parseInt(this.value.charAt(1)) === 9 && parseInt(this.value.charAt(2)) === 1) {
                    $('.phone_number_0_error').remove();
                    var maskuse = "+999999999999"
                    $("#phone_number").inputmask("mask", {"mask": maskuse});
                } else {
                    $('.phone_number_0_error').remove();
                    var maskuse = "+999999999999999"
                    $("#phone_number").inputmask("mask", {"mask": maskuse});
                }
            });


            $("#phone_number_for_otp").on('keyup', function () {
                if (parseInt(this.value.charAt(1)) === 0) {
                    // alert('First letter can NOT be "0"')
                    $('.phone_num_error_showing_otp_section').append(`<label for="phone_number_for_otp"
                                                         class="error_others phone_number_0_error_otp_section"
                                                        style="color:Red">First letter cannot be 0</label>`)
                    $('#phone_number_for_otp').val('');
                    return false
                } else if (parseInt(this.value.charAt(1)) === 1) {
                    $('.phone_number_0_error_otp_section').remove();
                    var maskuse = "+99999999999"
                    $("#phone_number_for_otp").inputmask("mask", {"mask": maskuse});
                } else if (parseInt(this.value.charAt(1)) === 4 && parseInt(this.value.charAt(2)) === 4) {
                    $('.phone_number_0_error_otp_section').remove();
                    var maskuse = "+999999999999"

                    $("#phone_number_for_otp").inputmask("mask", {"mask": maskuse});
                } else if (parseInt(this.value.charAt(1)) === 9 && parseInt(this.value.charAt(2)) === 1) {
                    $('.phone_number_0_error_otp_section').remove();
                    var maskuse = "+999999999999"
                    $("#phone_number_for_otp").inputmask("mask", {"mask": maskuse});
                } else {
                    $('.phone_number_0_error_otp_section').remove();
                    var maskuse = "+999999999999999"
                    $("#phone_number_for_otp").inputmask("mask", {"mask": maskuse});
                }

            });

            $("#pin_code").on('keyup', function () {
                if (parseInt(this.value.charAt(0)) === 0) {
                    alert('First letter can NOT be "0"')
                    $('#pin_code').val('');
                    return false
                } else if (parseInt(this.value.charAt(0)) === 1 && parseInt(this.value.charAt(1)) === 0
                    || parseInt(this.value.charAt(0)) === 2 && parseInt(this.value.charAt(1)) === 9
                    || parseInt(this.value.charAt(0)) === 3 && parseInt(this.value.charAt(1)) === 5
                    || parseInt(this.value.charAt(0)) === 5 && parseInt(this.value.charAt(1)) === 4
                    || parseInt(this.value.charAt(0)) === 5 && parseInt(this.value.charAt(1)) === 5
                    || parseInt(this.value.charAt(0)) === 6 && parseInt(this.value.charAt(1)) === 5
                    || parseInt(this.value.charAt(0)) === 6 && parseInt(this.value.charAt(1)) === 6
                    || parseInt(this.value.charAt(0)) === 8 && parseInt(this.value.charAt(1)) === 6
                    || parseInt(this.value.charAt(0)) === 8 && parseInt(this.value.charAt(1)) === 7
                    || parseInt(this.value.charAt(0)) === 8 && parseInt(this.value.charAt(1)) === 8
                    || parseInt(this.value.charAt(0)) === 8 && parseInt(this.value.charAt(1)) === 9
                ) {
                    $('#pin_code_error').html('');
                    $('#pin_code_error').html(parseInt(this.value.charAt(0)) + ' and ' + parseInt(this.value.charAt(1)) + ' are not allowd');
                    $('#pin_code_error').css('display','block');
                    // alert(parseInt(this.value.charAt(0)) + ' and ' + parseInt(this.value.charAt(1)) + ' are not allowd');
                    $('#pin_code').val('');
                }else{
                    $('#pin_code_error').html('');
                    $('#pin_code_error').css('display','none');
                }
            });


            $.validator.addMethod('regex', function (value, element, param) {
                return this.optional(element) ||
                    value.match(typeof param == 'string' ? new RegExp(param) : param);
            }, 'Please enter a value in the correct format.');

            $("#joining_form").validate({
                success: function (label, element) {
                    label.parent().removeClass('error');
                    label.remove();
                },

                rules: {
                    name: {
                        required: true,
                        minlength: 3,
                        maxlength: 70,
                        regex: /^[a-z](?!.*--)(?!.* {2})(?!.*[.]{2})[A-Za-z .-]{2,70}$/,
                        /*regex: /^[a-zA-Z]{1}[A-Za-z .-]{3,70}$/,*/
                    },
                    Advocate_Lawyer_practice_in_other: {
                        regex: /^\s*[a-zA-Z ,.]+\s*$/,
                    },
                    Advocate_Lawyer_practicing_other: {
                        regex: /^\s*[a-zA-Z ,.]+\s*$/,
                    },
                    email: {
                        required: true,
                        regex: /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,20}\b$/i,
                        remote: {
                            url: "{{route("check_membership_email")}}",
                            type: "GET",
                            data: {
                                action: function () {
                                    return $('#email').val();
                                },
                            }
                        }
                    },
                    dob: {
                        required: true,
                    },
                    phone_number: {
                        required: true,
                        minlength: 7,
                        maxlength: 16,
                        remote: {
                            url: "{{route("check_membership_phone_number")}}",
                            type: "GET",
                            data: {
                                action: function () {
                                    return $('#phone_number').val();
                                },
                            }
                        }
                    },
                    pin_code: {
                        regex: /^[0-9]*$/,
                        minlength: 6,
                        maxlength: 6,
                    },
                    Advocate_Lawyer_pin_code: {
                        regex: /^\s*[a-zA-Z0-9/-]+\s*$/,
                        remote: {
                            url: "{{route("check_membership_reg_num")}}",
                            type: "GET",
                            data: {
                                action: function () {
                                    return $('#Advocate_Lawyer_pin_code').val();
                                },
                            }
                        }
                    },
                    Law_Student_Activist_work_other: {
                        regex: /^\s*[a-zA-Z ,.]+\s*$/,
                    },
                    Journalist_work_other: {
                        regex: /^\s*[a-zA-Z ,.]+\s*$/,
                    },
                    Writer_work_other: {
                        regex: /^\s*[a-zA-Z ,.]+\s*$/,
                    },
                    Retired_Judge_from_other: {
                        regex: /^\s*[a-zA-Z ,.]+\s*$/,
                    },
                    Retired_Bureaucrat_as_other: {
                        regex: /^\s*[a-zA-Z ,.]+\s*$/,
                    },
                    medical_practitioner_as_other: {
                        regex: /^\s*[a-zA-Z ,.]+\s*$/,
                    },
                    other_option_seleted: {
                        regex: /^\s*[a-zA-Z ,.]+\s*$/,
                    },
                    organization_name_n_role: {
                        regex: /^\s*[a-zA-Z ,./]+\s*$/,
                    },
                    write_something_else: {
                        regex: /^\s*[a-zA-Z ,./]+\s*$/,
                    }
                },
                messages: {
                    name: {
                        required: "Please enter your name",
                        minlength: "Enter at least 3 characters",
                        maxlength: "Enter less then 70 characters",
                        regex: "<small>First character must be Letter. <br>Name can have letters, hyphens, periods or space only but not consecutively</small>"
                    },
                    phone_number: {
                        required: "Please enter your Mobile Number",
                        minlength: "Enter at least 7 Numbers",
                        maxlength: "Enter less then or equal to 16 Numbers",
                        // regex: "please enter alphabets only",
                        remote: "Phone Number already Registred"
                    },
                    email: {
                        required: "Please enter your email ",
                        regex: "Invalid Email",
                        remote: "Email id already registred"
                    },
                    pin_code: {
                        minlength: "Length must be 6 digits",
                        maxlength: "Length must be 6 digits",
                        regex: "Only Numbers are allowed"
                    },
                    Advocate_Lawyer_pin_code: {
                        regex: "Only alphabets ,numbers, slash(/) and dash(-)",
                        remote: "Reg Number already Registred"
                    },
                    Advocate_Lawyer_practice_in_other: {
                        regex: "Only alphabetes, space, comma(,) and dot(.)",
                    },
                    Advocate_Lawyer_practicing_other: {
                        regex: "Only alphabetes, space, comma(,) and dot(.)",
                    },
                    Law_Student_Activist_work_other: {
                        regex: "Only alphabetes, space, comma(,) and dot(.)"
                    },
                    Journalist_work_other: {
                        regex: "Only alphabetes, space, comma(,) and dot(.)"
                    },
                    Writer_work_other: {
                        regex: "Only alphabetes, space, comma(,) and dot(.)"
                    },
                    Retired_Judge_from_other: {
                        regex: "Only alphabetes, space, comma(,) and dot(.)"
                    },
                    Retired_Bureaucrat_as_other: {
                        regex: "Only alphabetes, space, comma(,) and dot(.)"
                    },
                    medical_practitioner_as_other: {
                        regex: "Only alphabetes, space, comma(,) and dot(.)"
                    },
                    other_option_seleted: {
                        regex: "Only alphabetes, space, comma(,) and dot(.)"
                    },
                    organization_name_n_role: {
                        regex: "Only alphabet, space, dot(.), comma(,) and hyphen (/)"
                    },
                    write_something_else: {
                        regex: "Only alphabet, space, dot(.), comma(,) and hyphen (/)"
                    }
                }
            });
        });



        $('#Advocate_Lawyer_pin_code').on('keyup', function () {
            string_tmp = $('.Advocate_Lawyer_pin_code').val();
            var reg_nm = string_tmp.split('/');
            var reg_nm_ = string_tmp.split('-');
            if (reg_nm.length > 3 || reg_nm_.length > 2) {
                $('.reg_num_Error').remove();
                $('.reg_error_double_slashes').append(`<label class="error_others reg_num_Error"
                style=" color: red;">Only two slashes(/) and one dash(-) is allowed</label>`);
            } else {
                $('.reg_num_Error').remove();
            }


            // if (reg_nm_.length > 2) {
            //     $('.reg_num_Error').remove();
            //     $('.reg_error_double_slashes').append(`<label class="error_others reg_num_Error"
            //     style=" color: red;">Only one dash(-) is allowed</label>`);
            // } else {
            //     $('.reg_num_Error').remove();
            // }
            

        });

        // $('#name').on('keypress', function (event) {
        //     var regex = new RegExp("^[A-Za-z .-]$");
        //     var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        //     if (!regex.test(key)) {
        //        // event.preventDefault();
        //        // return false;
        //        alert('Not allowed');
        //        $(this).val(key.replace(/[0-9]/g, ""));
        //     }
        // });


       /* $(".backBtn").click(function() {

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();
            console.log(current_fs);
            console.log(previous_fs);

        });*/

        function back(step,currentStep){
            // step-4-wizard-button

            $('#'+step).show();
            $('#'+currentStep).hide();
            $('.'+step+'-wizard-button').addClass('btn-primary');
            $('.'+currentStep+'-wizard-button').removeClass('btn-primary');

        }

    </script>
@endsection
