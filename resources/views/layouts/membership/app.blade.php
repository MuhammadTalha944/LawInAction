<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Lawyers In Action| @yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('dashboard/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <!-- Favicons -->
   <link rel="icon" href="{{asset('website/asset/img/favicons/favicon.png')}}">

    <!-- Custom styles for this template-->
    <link href="{{asset('dashboard/css/sb-admin-2.css')}}" rel="stylesheet">
    <style type="text/css">
            .btn-yellow {
                color: #2c2b2e;
                background-color: #ffcb06;
                border-color: #ffcb06;
                font-weight: bold;
            }
            .sm_btn_yellow{
                background-color: #feca05;
            }
            .btn-yellow {
                color: #2c2b2e;
                background-color: #ffcb06;
                border-color: #ffcb06;
                font-weight: bold;
            }
            /*            body{
                    margin-top:40px;
                }*/

                .stepwizard-step p {
                    margin-top: 10px;
                }

                .stepwizard-row {
                    display: table-row;
                }

                .stepwizard {
                    display: table;
                    width: 100%;
                    position: relative;
                }

                .stepwizard-step button[disabled] {
                    opacity: 1 !important;
                    filter: alpha(opacity=100) !important;
                }

                .stepwizard-row:before {
                    top: 14px;
                    bottom: 0;
                    position: absolute;
                    content: " ";
                    width: 100%;
                    height: 1px;
                    background-color: #ccc;
                    z-order: 0;

                }

                .stepwizard-step {
                    display: table-cell;
                    text-align: center;
                    position: relative;
                }

                .btn-circle {
                  width: 30px;
                  height: 30px;
                  text-align: center;
                  padding: 6px 0;
                  font-size: 12px;
                  line-height: 1.428571429;
                  border-radius: 15px;
                }
                .has-error{
                    /*border : 3px solid red;*/
                    border: 2px solid #ff3030;
                }
                .error{

                    font-size: 1rem !important;
                    width: 100% !important;
                    color: #ff3030;
                }
    </style>

</head>

@php
            $states = DB::table('states')->get();
            $countries = DB::table('countries')->get();
@endphp


<body class="bg-gradient-primary">

    <div class="container">
            <div class="row" style="margin: 0.25%;">
                    <a href="{{url('/')}}">
                        <img src="{{asset('website/asset/img/logo.png')}}" alt="LiA logo" style="width: 25%;">
                        <font style = "color: #ffcb06;font-weight: 700;"
                    >Lawyers In Action</font>
                     </a>
            </div>

            @yield('content')

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('dashboard/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('dashboard/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('dashboard/js/sb-admin-2.min.js')}}"></script>

    <script src="{{asset('dashboard/js/form_validationJS.js')}}"></script>
    <script src="{{asset('dashboard/js/sweetalert.js')}}"></script>
    <script type="text/javascript">
            $(document).ready(function () {

                CSRF_TOKEN   = "{{ csrf_token() }}";

                $('#category').change(function(){
                    var value = $(this).val();
                    if(value == "Advocate_Lawyer")
                    {
                        //checking validations

                        if($('#country').val() == 'India' && $('#citizenship_country').val() == 'India'){
                            $('.Advocate_Lawyer_check').prop('required', true);
                        }
                         $('.Law_Student_check').prop('required',false);
                         $('.Law_Student_Activist_check').prop('required',false);

                        $('.Journalist_check').prop('required',false);
                        $('.Journalist_work_other').prop('required',false);

                        $('.Writer_check').prop('required',false);
                        $('.Writer_work_other').prop('required',false);

                        $('.Retired_Judge_check').prop('required',false);
                        $('.Retired_Bureaucrat_check').prop('required',false);
                        $('.medical_practice').prop('required',false);


                        //others
                        $('.Law_Student_Activist_work_other').prop('required',false);
                        $('.Retired_Judge_from_other').prop('required',false);
                        $('.Retired_Bureaucrat_as_other').prop('required',false);
                        $('.medical_practitioner_as_other').prop('required',false);


                        //Show Hide
                        if($('#country').val() == 'India'){
                            $('#Advocate_Lawyer').slideDown();
                        }
                        $('#Law_Student').slideUp();
                        $('#Law_Student_Activist').slideUp();
                        $('#Journalist').slideUp();
                        $('#Writer').slideUp();
                        $('#Retired_Judge').slideUp();
                        $('#Retired_Bureaucrat').slideUp();
                        $('#medical_practice').slideUp();

                        $('#advocate_lawyer_file').slideDown();
                        $('#advocate_lawyer_not_selected').slideUp();
                        $('.advocate_lawyer_not_selected_files').prop('required', false);

                        $('.other_option_seleted').prop('required', false);

                        $('#other').slideUp();

                        $('.other_option_seleted').removeClass('error');
                        $('label[for=other_option_seleted]').remove();


                    }
                    else if(value == "Law_Student")
                    {
                        //checking validations
                        $('.Advocate_Lawyer_check').prop('required', false);
                        $('.Law_Student_check').prop('required',true);
                        $('.Law_Student_Activist_check').prop('required',false);
                        
                        $('.Journalist_check').prop('required',false);
                        $('.Journalist_work_other').prop('required',false);
                        
                        $('.Writer_check').prop('required',false); 
                        $('.Writer_work_other').prop('required',false);
                        
                        $('.Retired_Judge_check').prop('required',false);
                        $('.Retired_Bureaucrat_check').prop('required',false);
                        $('.medical_practice').prop('required',false);

                        //others
                        $('.Advocate_Lawyer_practice_in_other').prop('required',false);
                        $('.Advocate_Lawyer_practicing_other').prop('required',false);
                        $('.Law_Student_Activist_work_other').prop('required',false);
                        $('.Retired_Judge_from_other').prop('required',false);
                        $('.Retired_Bureaucrat_as_other').prop('required',false);
                        $('.medical_practitioner_as_other').prop('required',false);


                        //Show Hide

                        $('#Advocate_Lawyer').slideUp();
                        $('#Law_Student').slideDown();
                        $('#Law_Student_Activist').slideUp();
                        $('#Journalist').slideUp();
                        $('#Writer').slideUp();
                        $('#Retired_Judge').slideUp();
                        $('#Retired_Bureaucrat').slideUp();
                        $('#medical_practice').slideUp();
                        $('#advocate_lawyer_file').slideUp();

                        $('#advocate_lawyer_not_selected').slideDown();
                        $('.advocate_lawyer_not_selected_files').prop('required', true);



                        $('.other_option_seleted').prop('required', false);

                        $('#other').slideUp();

                        $('.other_option_seleted').removeClass('error');
                        $('label[for=other_option_seleted]').remove();



                    }
                    else if(value == "Law_Student_Activist")
                    {
                        //checking validations
                        $('.Advocate_Lawyer_check').prop('required', false);
                        $('.Law_Student_check').prop('required',false);
                        $('.Law_Student_Activist_check').prop('required',true);
                        
                        $('.Journalist_check').prop('required',false);
                        $('.Journalist_work_other').prop('required',false);
                        
                        $('.Writer_check').prop('required',false); 
                        $('.Writer_work_other').prop('required',false);
                        
                        $('.Retired_Judge_check').prop('required',false);
                        $('.Retired_Bureaucrat_check').prop('required',false);
                        $('.medical_practice').prop('required',false);

                        //others
                        $('.Advocate_Lawyer_practice_in_other').prop('required',false);
                        $('.Advocate_Lawyer_practicing_other').prop('required',false);
                        // $('.Law_Student_Activist_work_other').prop('required',false);
                        $('.Retired_Judge_from_other').prop('required',false);
                        $('.Retired_Bureaucrat_as_other').prop('required',false);
                        $('.medical_practitioner_as_other').prop('required',false);


                        //Show Hide

                        $('#Advocate_Lawyer').slideUp();
                        $('#Law_Student').slideUp();
                        $('#Law_Student_Activist').slideDown();
                        $('#Journalist').slideUp();
                        $('#Writer').slideUp();
                        $('#Retired_Judge').slideUp();
                        $('#Retired_Bureaucrat').slideUp();
                        $('#medical_practice').slideUp();
                        $('#advocate_lawyer_file').slideUp();
                        $('#advocate_lawyer_not_selected').slideDown();
                        $('.advocate_lawyer_not_selected_files').prop('required', true);

                        $('.other_option_seleted').prop('required', false);

                        $('#other').slideUp();

                        $('.other_option_seleted').removeClass('error');
                        $('label[for=other_option_seleted]').remove();


                    }
                    else if(value == "Journalist")
                    {
                        //checking validations
                        $('.Advocate_Lawyer_check').prop('required', false);
                        $('.Law_Student_check').prop('required',false);
                        $('.Law_Student_Activist_check').prop('required',false);
                        
                        $('.Journalist_check').prop('required',true);
                        
                        $('.Writer_check').prop('required',false); 
                        $('.Writer_work_other').prop('required',false);
                        
                        $('.Retired_Judge_check').prop('required',false);
                        $('.Retired_Bureaucrat_check').prop('required',false);
                        $('.medical_practice').prop('required',false);

                        //others
                        $('.Advocate_Lawyer_practice_in_other').prop('required',false);
                        $('.Advocate_Lawyer_practicing_other').prop('required',false);
                        $('.Law_Student_Activist_work_other').prop('required',false);
                        $('.Retired_Judge_from_other').prop('required',false);
                        $('.Retired_Bureaucrat_as_other').prop('required',false);
                        $('.medical_practitioner_as_other').prop('required',false);


                        //Show Hide

                        $('#Advocate_Lawyer').slideUp();
                        $('#Law_Student').slideUp();
                        $('#Law_Student_Activist').slideUp();
                        $('#Journalist').slideDown();
                        $('#Writer').slideUp();
                        $('#Retired_Judge').slideUp();
                        $('#Retired_Bureaucrat').slideUp();
                        $('#medical_practice').slideUp();
                        $('#advocate_lawyer_file').slideUp();
                        $('#advocate_lawyer_not_selected').slideDown();
                        $('.advocate_lawyer_not_selected_files').prop('required', true);

                        $('.other_option_seleted').prop('required', false);

                        $('#other').slideUp();


                        $('.other_option_seleted').removeClass('error');
                        $('label[for=other_option_seleted]').remove();


                    }
                    else if(value == "Writer")
                    {
                        //checking validations
                        $('.Advocate_Lawyer_check').prop('required', false);
                         $('.Law_Student_check').prop('required',false);
                        $('.Law_Student_Activist_check').prop('required',false);
                        
                        $('.Journalist_check').prop('required',false);
                        $('.Journalist_work_other').prop('required',false);

                        $('.Writer_check').prop('required',true);

                        $('.Retired_Judge_check').prop('required',false);
                        $('.Retired_Bureaucrat_check').prop('required',false);
                        $('.medical_practice').prop('required',false);


                        //others
                        $('.Advocate_Lawyer_practice_in_other').prop('required',false);
                        $('.Advocate_Lawyer_practicing_other').prop('required',false);
                        $('.Law_Student_Activist_work_other').prop('required',false);
                        $('.Retired_Judge_from_other').prop('required',false);
                        $('.Retired_Bureaucrat_as_other').prop('required',false);
                        $('.medical_practitioner_as_other').prop('required',false);


                        //Show Hide

                        $('#Advocate_Lawyer').slideUp();
                        $('#Law_Student').slideUp();
                        $('#Law_Student_Activist').slideUp();
                        $('#Journalist').slideUp();
                        $('#Writer').slideDown();
                        $('#Retired_Judge').slideUp();
                        $('#Retired_Bureaucrat').slideUp();
                        $('#medical_practice').slideUp();
                        $('#advocate_lawyer_file').slideUp();
                        $('#advocate_lawyer_not_selected').slideDown();
                        $('.advocate_lawyer_not_selected_files').prop('required', true);

                        $('#other').slideUp();

                        $('.other_option_seleted').removeClass('error');
                        $('label[for=other_option_seleted]').remove();


                    }
                    else if(value == "Retired_Judge")
                    {
                        //checking validations
                        $('.Advocate_Lawyer_check').prop('required', false);
                        $('.Law_Student_check').prop('required',false);
                        $('.Law_Student_Activist_check').prop('required',false);
                        
                        $('.Journalist_check').prop('required',false);
                        $('.Journalist_work_other').prop('required',false);
                        
                        $('.Writer_check').prop('required',false); 
                        $('.Writer_work_other').prop('required',false);

                        if($('#country').val() == 'India'){
                            $('.Retired_Judge_check').prop('required',true);
                        }

                        $('.Retired_Bureaucrat_check').prop('required',false);
                        $('.medical_practice').prop('required',false);


                        //others
                        $('.Advocate_Lawyer_practice_in_other').prop('required',false);
                        $('.Advocate_Lawyer_practicing_other').prop('required',false);
                        $('.Law_Student_Activist_work_other').prop('required',false);
                        $('.Retired_Judge_from_other').prop('required',false);
                        $('.Retired_Bureaucrat_as_other').prop('required',false);
                        $('.medical_practitioner_as_other').prop('required',false);


                        //Show Hide

                        $('#Advocate_Lawyer').slideUp();
                        $('#Law_Student').slideUp();
                        $('#Law_Student_Activist').slideUp();
                        $('#Journalist').slideUp();
                        $('#Writer').slideUp();

                        if($('#country').val() == 'India'){
                            $('#Retired_Judge').slideDown();
                        }

                        $('#Retired_Bureaucrat').slideUp();
                        $('#medical_practice').slideUp();
                        $('#advocate_lawyer_file').slideUp();
                        $('#advocate_lawyer_not_selected').slideDown();
                        $('.advocate_lawyer_not_selected_files').prop('required', true);

                        $('.other_option_seleted').prop('required', false);

                        $('#other').slideUp();


                        $('.other_option_seleted').removeClass('error');
                        $('label[for=other_option_seleted]').remove();


                    }

                    else if(value == "Retired_Bureaucrat")
                    {
                        //checking validations
                        $('.Advocate_Lawyer_check').prop('required', false);
                        $('.Law_Student_check').prop('required',false);
                        $('.Law_Student_Activist_check').prop('required',false);
                        
                        $('.Journalist_check').prop('required',false);
                        $('.Journalist_work_other').prop('required',false);
                        
                        $('.Writer_check').prop('required',false); 
                        $('.Writer_work_other').prop('required',false);
                        
                        $('.Retired_Judge_check').prop('required',false);

                        if($('#country').val() == 'India'){
                            $('.Retired_Bureaucrat_check').prop('required',true);
                        }

                        $('.medical_practice').prop('required',false);


                        //others
                        $('.Advocate_Lawyer_practice_in_other').prop('required',false);
                        $('.Advocate_Lawyer_practicing_other').prop('required',false);
                        $('.Law_Student_Activist_work_other').prop('required',false);
                        $('.Retired_Judge_from_other').prop('required',false);
                        $('.Retired_Bureaucrat_as_other').prop('required',false);
                        $('.medical_practitioner_as_other').prop('required',false);


                        //Show Hide
                        $('#Advocate_Lawyer').slideUp();
                        $('#Law_Student').slideUp();
                        $('#Law_Student_Activist').slideUp();
                        $('#Journalist').slideUp();
                        $('#Writer').slideUp();
                        $('#Retired_Judge').slideUp();

                        if($('#country').val() == 'India'){
                            $('#Retired_Bureaucrat').slideDown();
                        }

                        $('#medical_practice').slideUp();
                        $('#advocate_lawyer_file').slideUp();
                        $('#advocate_lawyer_not_selected').slideDown();
                        $('.advocate_lawyer_not_selected_files').prop('required', true);


                        $('.other_option_seleted').prop('required', false);

                        $('#other').slideUp();


                        $('.other_option_seleted').removeClass('error');
                        $('label[for=other_option_seleted]').remove();


                    }

                    else if(value == "Medical_Practitioner")
                    {
                        //checking validations
                        $('.Advocate_Lawyer_check').prop('required', false);
                        $('.Law_Student_check').prop('required',false);
                        $('.Law_Student_Activist_check').prop('required',false);
                        
                        $('.Journalist_check').prop('required',false);
                        $('.Journalist_work_other').prop('required',false);
                        
                        $('.Writer_check').prop('required',false); 
                        $('.Writer_work_other').prop('required',false);
                        
                        $('.Retired_Judge_check').prop('required',false);
                        $('.Retired_Bureaucrat_check').prop('required',false);
                        $('.medical_practice').prop('required',true);


                        //others
                        $('.Advocate_Lawyer_practice_in_other').prop('required',false);
                        $('.Advocate_Lawyer_practicing_other').prop('required',false);
                        $('.Law_Student_Activist_work_other').prop('required',false);
                        $('.Retired_Judge_from_other').prop('required',false);
                        $('.Retired_Bureaucrat_as_other').prop('required',false);
                        $('.medical_practitioner_as_other').prop('required',false);

                        //Show Hide
                        $('#Advocate_Lawyer').slideUp();
                        $('#Law_Student').slideUp();
                        $('#Law_Student_Activist').slideUp();
                        $('#Journalist').slideUp();
                        $('#Writer').slideUp();
                        $('#Retired_Judge').slideUp();
                        $('#Retired_Bureaucrat').slideUp();
                        $('#medical_practice').slideDown();
                        $('#advocate_lawyer_file').slideUp();
                        
                        $('#advocate_lawyer_not_selected').slideDown();
                        $('.advocate_lawyer_not_selected_files').prop('required', true);

                        $('.other_option_seleted').prop('required', false);

                        $('#other').slideUp();


                        $('.other_option_seleted').removeClass('error');
                        $('label[for=other_option_seleted]').remove();


                    }


                    else if(value == "Other_Accredited_Person" || value == "Others" )
                    {
                        //checking validations
                        $('.Advocate_Lawyer_check').prop('required', false);
                        $('.Law_Student_check').prop('required',false);
                        $('.Law_Student_Activist_check').prop('required',false);
                        
                        $('.Journalist_check').prop('required',false);
                        $('.Journalist_work_other').prop('required',false);
                        
                        $('.Writer_check').prop('required',false); 
                        $('.Writer_work_other').prop('required',false);
                        
                        $('.Retired_Judge_check').prop('required',false);
                        $('.Retired_Bureaucrat_check').prop('required',false);
                        $('.medical_practice').prop('required',false);
                        $('.other_option_seleted').prop('required', true);
                        //Show Hide
                        $('#Advocate_Lawyer').slideUp();
                        $('#Law_Student').slideUp();
                        $('#Law_Student_Activist').slideUp();
                        $('#Journalist').slideUp();
                        $('#Writer').slideUp();
                        $('#Retired_Judge').slideUp();
                        $('#Retired_Bureaucrat').slideUp();
                        $('#medical_practice').slideUp();
                        $('#other').slideDown();
                        $('#advocate_lawyer_file').slideUp();
                        $('#advocate_lawyer_not_selected').slideDown();
                        $('.advocate_lawyer_not_selected_files').prop('required', true);

                        //others
                        $('.Advocate_Lawyer_practice_in_other').prop('required',false);
                        $('.Advocate_Lawyer_practicing_other').prop('required',false);
                        $('.Law_Student_Activist_work_other').prop('required',false);
                        $('.Retired_Judge_from_other').prop('required',false);
                        $('.Retired_Bureaucrat_as_other').prop('required',false);
                        $('.medical_practitioner_as_other').prop('required',false);

                    }

                    else{
                        //checking validations
                        $('.Advocate_Lawyer_check').prop('required', false);
                        $('.Law_Student_check').prop('required',false);
                        $('.Law_Student_Activist_check').prop('required',false);
                        
                        $('.Journalist_check').prop('required',false);
                        $('.Journalist_work_other').prop('required',false);
                        
                        $('.Writer_check').prop('required',false); 
                        $('.Writer_work_other').prop('required',false);
                        
                        $('.Retired_Judge_check').prop('required',false);
                        $('.Retired_Bureaucrat_check').prop('required',false);
                        $('.medical_practice').prop('required',false);
                        $('.other_option_seleted').prop('required', false);


                        //others
                        $('.Advocate_Lawyer_practice_in_other').prop('required',false);
                        $('.Advocate_Lawyer_practicing_other').prop('required',false);
                        $('.Law_Student_Activist_work_other').prop('required',false);
                        $('.Retired_Judge_from_other').prop('required',false);
                        $('.Retired_Bureaucrat_as_other').prop('required',false);
                        $('.medical_practitioner_as_other').prop('required',false);

                        //Show Hide
                        $('#Advocate_Lawyer').slideUp();
                        $('#Law_Student').slideUp();
                        $('#Law_Student_Activist').slideUp();
                        $('#Journalist').slideUp();
                        $('#Writer').slideUp();
                        $('#Retired_Judge').slideUp();
                        $('#Retired_Bureaucrat').slideUp();
                        $('#medical_practice').slideUp();
                        $('#other').slideUp();
                        $('#advocate_lawyer_file').slideUp();
                        $('#advocate_lawyer_not_selected').slideDown();
                        $('.advocate_lawyer_not_selected_files').prop('required', true);

                        $('.other_option_seleted').removeClass('error');
                        $('label[for=other_option_seleted]').remove();
                    }

                });

                $('#country').change(function(){

                    var country = $(this).val();

                    if(country == 'India'){

                            $('.country_dependent').slideDown();

                            $('#states').prop("required", true);
                            $('#district').prop("required", true);
                            $('.country_dependent_check').prop("required", true);
                            $('#nri_selection').slideUp();
                            $('#nri_person').prop('required', false);

                    }else{
                            $('.country_dependent').slideUp();

                            $('#states').prop("required", false);
                            $('#district').prop("required", false);

                            $('.country_dependent_check').prop("required", false);

                            if($('#citizenship_country').val() == 'India'){
                                $('#nri_selection').slideDown();
                                $('#nri_person').prop('required', true);                                
                            }


                    }

                });

                $('#another_membership').change(function(){
                    var membership = $(this).val();
                    if(membership == 'Yes'){
                            $('#organization_name_n_role').css('display','block');
                            $('.another_membership_check').prop('required',true);
                    }else{
                            $('#organization_name_n_role').css('display','none');
                            $('.another_membership_check').prop('required',false);

                            $('.another_membership_check').val("");
                            $('.another_membership_check').removeClass('error');
                            $('label[for=organization_name_n_role]').remove();
                    }
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

                var navListItems = $('div.setup-panel div a'),
                        allWells = $('.setup-content'),
                        allNextBtn = $('.nextBtn');

                allWells.hide();

                navListItems.click(function (e) {
                    e.preventDefault();
                    var $target = $($(this).attr('href')),
                            $item = $(this);

                    if (!$item.hasClass('disabled')) {
                        navListItems.removeClass('btn-primary').addClass('btn-default');
                        $item.addClass('btn-primary');
                        allWells.hide();
                        $target.show();
                        $target.find('input:eq(0)').focus();
                    }
                });

                allNextBtn.click(function(){

                    // console.log("in here next");
                    // console.log(allNextBtn)
                    var curStep = $(this).closest(".setup-content"),
                        curStepBtn = curStep.attr("id"),
                        nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                        curInputs = curStep.find("input,select,textarea"),
                        isValid = true;

                    // console.log(curStepBtn);


                    
                    // console.log('id is')
                    // console.log(curStepBtn)
                    $("#joining_form").valid();
                    $(".form-control ").removeClass("has-error");
                    $('.error_report').slideUp();

                    if(curStepBtn  == 'step-3'){
                        console.log("in")
                        console.log($('.my_qualification:checkbox:checked').length)
                        if($('.my_qualification:checkbox:checked').length == 0){
                            $('.checkboxesError').remove();

                            $('.my_qualification_Error').show();
                            $('.my_qualification_Error').append(`<label
                                                         class="error_others checkboxesError"
                                                        style="color:Red">!!</label>`);
                            $('.error_report').css('display','block');
                        }else {
                            $('.my_qualification_Error').hide();
                            $('.error_report').hide();
                            $('.checkboxesError').remove();
                        }

                        if($('.legal_domain_parent').prop('checked')){
                            if($('.legal_domain_options:checkbox:checked').length == 0){
                                $('.legal_option_err').remove();
                                $('.legal_domain_error').append(`<label
                                                             class="error_others legal_option_err"
                                                            style="color:Red">(Select atleast one option)</label>`);
                                $('.error_report').css('display','block');
                            }else{
                                $('.legal_option_err').remove();
                            }
                        }

                        if($('.content_writing_parent').prop('checked')){
                            if($('.content_writing_options:checkbox:checked').length == 0){
                                $('.content_writing_option_err').remove();
                                $('.content_writing_error').append(`<label
                                                             class="error_others content_writing_option_err"
                                                            style="color:Red">(Select atleast one option)</label>`);
                                $('.error_report').css('display','block');
                            }else{
                                $('.content_writing_option_err').remove();
                            }
                        }

                        if($('.journal_work_parent').prop('checked')){
                            if($('.journal_work_options:checkbox:checked').length == 0){
                                $('.journal_work_option_err').remove();
                                $('.journal_work_error').append(`<label
                                                             class="error_others journal_work_option_err"
                                                            style="color:Red">(Select atleast one option)</label>`);
                                $('.error_report').css('display','block');
                            }else{
                                $('.journal_work_option_err').remove();
                            }
                        }


                        if($('.fund_raising_parent').prop('checked')){
                            if($('.fund_raising_options:checkbox:checked').length == 0){
                                $('.fund_raising_option_err').remove();
                                $('.fund_raising_error').append(`<label
                                                             class="error_others fund_raising_option_err"
                                                            style="color:Red">(Select atleast one option)</label>`);
                                $('.error_report').css('display','block');
                            }else{
                                $('.fund_raising_option_err').remove();
                            }
                        }


                        if($('.info_tech_parent').prop('checked')){
                            if($('.info_tech_options:checkbox:checked').length == 0){
                                $('.info_tech_option_err').remove();
                                $('.info_tech_error').append(`<label
                                                             class="error_others info_tech_option_err"
                                                            style="color:Red">(Select atleast one option)</label>`);
                                $('.error_report').css('display','block');
                            }else{
                                $('.info_tech_option_err').remove();
                            }
                        }
                        
                        if($('#country').val() == 'India' && $('#citizenship_country').val() == 'India'){
                            if($('.accounts_parent').prop('checked')){
                                if($('.accounts_options:checkbox:checked').length == 0){
                                    $('.accounts_option_err').remove();
                                    $('.accounts_error').append(`<label
                                                                 class="error_others accounts_option_err"
                                                                style="color:Red">(Select atleast one option)</label>`);
                                    $('.error_report').css('display','block');
                                }else{
                                    $('.accounts_option_err').remove();
                                }
                            }

                            if($('.complainces_parent').prop('checked')){
                                if($('.complainces_options:checkbox:checked').length == 0){
                                    $('.complainces_option_err').remove();
                                    $('.complainces_error').append(`<label
                                                                 class="error_others complainces_option_err"
                                                                style="color:Red">(Select atleast one option)</label>`);
                                    $('.error_report').css('display','block');
                                }else{
                                    $('.complainces_option_err').remove();
                                }
                            }
                        }

                        if($('.expert_opinion_parent').prop('checked')){
                            if($('.expert_opinion_options:checkbox:checked').length == 0){
                                $('.expert_option_err').remove();
                                $('.expert_opinion_error').append(`<label
                                                             class="error_others expert_option_err"
                                                            style="color:Red">(Select atleast one option)</label>`);
                                $('.error_report').css('display','block');
                            }else{
                                $('.expert_option_err').remove();
                            }
                        }

                        if($('.other_parent').prop('checked')){
                            if($('.other_option_val').val().length == 0){
                                $('.other_option_err_msg').remove();
                                $('.other_option_err').append(`<label
                                                             class="error_others other_option_err_msg"
                                                            style="color:Red">(This option is required!)</label>`);
                                $('.error_report').css('display','block');
                            }else{
                                $('.other_option_err_msg').remove();
                            }
                        }
                        
                    }


                    //checking if the error is still exist in the html which is not shown on screen
                    if( !$('.error').is(':visible') ) {
                        console.log('Still error!!');

                        $('select').removeClass('error');
                        $('input').removeClass('error');
                        $('textarea').removeClass('error');
                        $('label').removeClass('error');

                    }

                    for(var i=0; i<curInputs.length; i++){

                        var mob_num_len = $("#phone_number").val().length;
                        if(mob_num_len == 16){
                                var chk_mb_nm = $("#phone_number").val().replace(/_/g,"");
                                if(chk_mb_nm.length < 6 ){
                                    $('.phone_number_limit').remove();
                                    isValid = false;
                                     $('.phone_num_error_showing').append(`<label
                                                         class="error_others phone_number_limit"
                                                        style="color:Red">Minimum Numbers should be 6</label>`);
                                }
                                else{
                                    $('.phone_number_limit').remove();
                                }
                        }else if(mob_num_len == 13){
                                var chk_mb_nm = $("#phone_number").val().replace(/_/g,"");
                                if(chk_mb_nm.length < 13 ){
                                    $('.phone_number_limit').remove();
                                    isValid = false;
                                     $('.phone_num_error_showing').append(`<label
                                                         class="error_others phone_number_limit"
                                                        style="color:Red">Mobile No. must be of 13 digits</label>`);
                                }
                                else{
                                    $('.phone_number_limit').remove();
                                }
                        }else if(mob_num_len == 12){
                                var chk_mb_nm = $("#phone_number").val().replace(/_/g,"");
                                if(chk_mb_nm.length < 12 ){
                                    $('.phone_number_limit').remove();
                                    isValid = false;
                                     $('.phone_num_error_showing').append(`<label
                                                         class="error_others phone_number_limit"
                                                        style="color:Red">Mobile No. must be of 12 digits</label>`);
                                }
                                else{
                                    $('.phone_number_limit').remove();
                                }
                        }

                        if($('.error_others').length > 0){
                            console.log('inside .error_others check');
                            isValid = false;
                            $('.error_report').css('display','block');
                        }

                        if (!curInputs[i].validity.valid){
                            console.log('inside curInputs validaity check');
                            console.log(curInputs[i]);
                            isValid = false;
                            $(curInputs[i]).closest(".form-control ").addClass("has-error");
                            $('.error_report').css('display','block');
                        }



                        if($('.my_qualification:checkbox:checked').length > 4 ){
                            swal.fire('Maximum 4 options are allowed only for role selection!','','error');
                            isValid = false;
                            $('.error_report').css('display','block');
                        }

                        if($('.error').length > 0){
                            console.log('inside .error length check');
                            // console.log('inside error_others length');
                            isValid = false;
                            $('.error_report').css('display','block');
                        }


                    }

                    // alert(isValid+ ' Outside foreach');



                    if (isValid == true){
                        nextStepWizard.removeAttr('disabled').trigger('click');
                    }
                });

                $('div.setup-panel div a.btn-primary').trigger('click');


                var countries = <?php echo $countries; ?>;

                var countries = $.map(countries, function(value, index) {
                            return [value];
                    });

                $('#citizenship_country').change(function(){

                    $('.country_dependent').slideUp();
                    $('#states').prop("required", false);
                    $('#district').prop("required", false);
                    $('.country_dependent_check').prop("required", false);
                    $('#nri_person').prop('required', true); 


                    var citiznsip = $(this).val();
                    if(citiznsip != 'India'){
                        $('#oci_selection').slideDown();
                        
                    }
                    if(citiznsip == 'India'){
                        $('#oci_selection').slideUp();
                    }

                    $('#country').empty();
                    var rslt = [];
                        rslt = '<option value="">-Select Option-</option>';
                    for(var i =0; i < countries.length; i++){
                            rslt += '<option value='+countries[i]['country_name']+'>'+countries[i]['country_name']+'</option>'
                    }
                     rslt += '<option value="other">Other</option>';
                    $('#country').append(rslt);
                    $('#country').prop('disabled', false);

                });

                $('#oci_person').change(function(){

                    $('.country_dependent').slideUp();
                    $('#states').prop("required", false);
                    $('#district').prop("required", false);
                    $('.country_dependent_check').prop("required", false);
                    $('#nri_person').prop('required', true);                                

                    var oci = $(this).val();
                    if(oci == 'No'){
                        
                        $('#country').empty();
                        $('#nri_person').val('');
                        $('#nri_selection').slideUp();
                        $('#nri_person').prop('required', false);

                        $('#country').prop('disabled', false);

                        var rslt = [];
                         rslt = '<option value="">-Select Option-</option>';
                        for(var i =0; i < countries.length; i++){
                            if(countries[i]['country_name'] != 'India'){
                                rslt += '<option value='+countries[i]['country_name']+'>'+countries[i]['country_name']+'</option>'
                            }
                        }
                         rslt += '<option value="other">Other</option>';
                        $('#country').append(rslt);
                        // $('#india_val_country').prop('disabled',true);

                    }else{
                        
                        $('#country').empty();
                        $('#nri_person').val('');
                        $('#nri_selection').slideUp();
                        $('#nri_person').prop('required', false);

                        $('#country').prop('disabled', false);

                        var rslt = [];
                         rslt = '<option value="">-Select Option-</option>';
                        for(var i =0; i < countries.length; i++){
                            // if(countries[i]['country_name'] != 'India'){
                                rslt += '<option value='+countries[i]['country_name']+'>'+countries[i]['country_name']+'</option>'
                            // }
                        }
                         rslt += '<option value="other">Other</option>';
                        $('#country').append(rslt);
                        // $('#country').append('<option value="India">India</option>');

                        // $('#india_val_country').prop('disabled',false);
                    }

                });


                // Add more lang
                var addLang = $('.add_lang');
                var langs = $('.lang_wrapper');
                var lang_x = 2;

                $(addLang).click(function(){
                var maxField = 4;
                var fieldHTML = `<div class="form-group  row"  id="lang_`+lang_x+`">
                                                            <div class="col-sm-6">
                                                                <label>Language Known:</label>
                                                                 <select class="form-control check_lang_profeciency selected_lang" name="lang_selection[]" required>
                                                                        <option value="">--Select Option--</option>
                                                                        <option value='English'>English</option>
                                                                        <option value='Hindi'>Hindi</option>
                                                                        <option value='Urdu'>Urdu</option>
                                                                        <option value='Assamese'>Assamese</option>
                                                                        <option value='Bengali'>Bengali</option>
                                                                        <option value='Gujarati'>Gujarati</option>
                                                                        <option value='Kannada'>Kannada</option>
                                                                        <option value='Kashmiri'>Kashmiri</option>
                                                                        <option value='Malayalam'>Malayalam</option>
                                                                        <option value='Manipuri'>Manipuri</option>
                                                                        <option value='Marathi'>Marathi</option>
                                                                        <option value='Odia'>Odia</option>
                                                                        <option value='Punjabi'>Punjabi</option>
                                                                        <option value='Tamil'>Tamil</option>
                                                                        <option value='Telugu'>Telugu</option>
                                                                        <option value='Arabic'>Arabic</option>
                                                                        <option value='Chinese'>Chinese</option>
                                                                        <option value='French'>French</option>
                                                                        <option value='German'>German</option>
                                                                        <option value='Italian'>Italian</option>
                                                                        <option value='Japanese'>Japanese</option>
                                                                        <option value='Korean'>Korean</option>
                                                                        <option value='Persian'>Persian</option>
                                                                        <option value='Portuguese'>Portuguese</option>
                                                                        <option value='Russian'>Russian</option>
                                                                        <option value='Spanish'>Spanish</option>
                                                                        <option value='Turkish'>Turkish</option>
                                                                        <option value='Afar'>Afar</option>
                                                                        <option value='Albanian'>Albanian</option>
                                                                        <option value='Armenian'>Armenian</option>
                                                                        <option value='Azerbaijani'>Azerbaijani</option>
                                                                        <option value='Bosnian'>Bosnian</option>
                                                                        <option value='Bulgarian'>Bulgarian</option>
                                                                        <option value='Burmese'>Burmese</option>
                                                                        <option value='Chichewa'>Chichewa</option>
                                                                        <option value='Comorian'>Comorian</option>
                                                                        <option value='Croatian'>Croatian</option>
                                                                        <option value='Czech'>Czech</option>
                                                                        <option value='Danish'>Danish</option>
                                                                        <option value='Dhivehi'>Dhivehi</option>
                                                                        <option value='Dutch'>Dutch</option>
                                                                        <option value='Dzongkha'>Dzongkha</option>
                                                                        <option value='Estonian'>Estonian</option>
                                                                        <option value='Fijian'>Fijian</option>
                                                                        <option value='Filipino'>Filipino</option>
                                                                        <option value='Finnish'>Finnish</option>
                                                                        <option value='Georgian'>Georgian</option>
                                                                        <option value='Greek'>Greek</option>
                                                                        <option value='Hebrew'>Hebrew</option>
                                                                        <option value='Hungarian'>Hungarian</option>
                                                                        <option value='Icelandic'>Icelandic</option>
                                                                        <option value='Indonesian'>Indonesian</option>
                                                                        <option value='Kazakh'>Kazakh</option>
                                                                        <option value='Khmer'>Khmer</option>
                                                                        <option value='Kirundi'>Kirundi</option>
                                                                        <option value='Kyrgyz'>Kyrgyz</option>
                                                                        <option value='Lao'>Lao</option>
                                                                        <option value='Latvian'>Latvian</option>
                                                                        <option value='Lithuanian'>Lithuanian</option>
                                                                        <option value='Luxembourgish'>Luxembourgish</option>
                                                                        <option value='Macedonian'>Macedonian</option>
                                                                        <option value='Malagasy'>Malagasy</option>
                                                                        <option value='Malaysian'>Malaysian</option>
                                                                        <option value='Maltese'>Maltese</option>
                                                                        <option value='Moldovan'>Moldovan</option>
                                                                        <option value='Mongolian'>Mongolian</option>
                                                                        <option value='Nepali'>Nepali</option>
                                                                        <option value='Norwegian'>Norwegian</option>
                                                                        <option value='Palauan'>Palauan</option>
                                                                        <option value='Pashto'>Pashto</option>
                                                                        <option value='Polish'>Polish</option>
                                                                        <option value='Quechua'>Quechua</option>
                                                                        <option value='Romanian'>Romanian</option>
                                                                        <option value='Serbian'>Serbian</option>
                                                                        <option value='Sinhala'>Sinhala</option>
                                                                        <option value='Slovak'>Slovak</option>
                                                                        <option value='Slovene'>Slovene</option>
                                                                        <option value='Somali'>Somali</option>
                                                                        <option value='Sotho'>Sotho</option>
                                                                        <option value='Swahili'>Swahili</option>
                                                                        <option value='Swazi'>Swazi</option>
                                                                        <option value='Swedish'>Swedish</option>
                                                                        <option value='Tajik'>Tajik</option>
                                                                        <option value='Thai'>Thai</option>
                                                                        <option value='Tigrinya'>Tigrinya</option>
                                                                        <option value='Tongan'>Tongan</option>
                                                                        <option value='Tswana'>Tswana</option>
                                                                        <option value='Turkmen'>Turkmen</option>
                                                                        <option value='Ukrainian'>Ukrainian</option>
                                                                        <option value='Uzbek'>Uzbek</option>
                                                                        <option value='Vietnamese'>Vietnamese</option>

                                                                    </select>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <label>Profeciency:</label>
                                                                 <select class="form-control " name="lang_profecient[]"  id="" required>
                                                                        <option value="">--Select Option--</option>
                                                                        <option value="Native_Bilingual">Native/Bilingual</option>
                                                                        <option value="Profecient">Profecient</option>
                                                                        <option value="Limited">Limited</option>
                                                                        <option value="Basic">Basic</option>
                                                                    </select>
                                                            </div>
                                                            <div class="col-sm-1" style="margin-top: 4%;">
                                                                <a href="javascript:void(0);" class="remove_lang btn btn-sm btn-danger" id=`+lang_x+`>
                                                                <i class="fas fa-trash"></i>
                                                                </a>
                                                            </div>
                                                           `;

                if(lang_x <= maxField){
                    lang_x++;
                    $(langs).append(fieldHTML);
                }else{
                    alert('Maximum options are added');
                }
            });

            //
            $(langs).on('click', '.remove_lang', function(e){
                e.preventDefault();
                $('#lang_'+$(this).attr('id')).remove();
                lang_x--;
            });


            //Append selected language in second step to third step
            $('#language_selections').on('change', '.selected_lang', function() {
              var input = document.getElementsByName('lang_selection[]');
                $('body').find('.selected_lang_2nd_step').html('');
              // $('body.selected_lang_2nd_step').html('');

                var languages = '<option value="">--Select Option--</option>';
                for (var i = 0; i < input.length; i++) {
                    var a = input[i];
                    // k = k + "array[" + i + "].value= " + a.value + " ";
                    languages += '<option value="'+a.value+'">'+a.value+'</option>';
                }
                $('body').find('.selected_lang_2nd_step').append(languages);
              console.log(languages);
              // console.log($('.selected_lang').val());
            }); 

            // $('.selected_lang').on('change', function(){
            //     // console.log($('.selected_lang').val());
            //     var input = document.getElementsByName('lang_selection[]');
            //     console.log(input);
            // });
            
            


            // $(document).on("change", "select.selected_lang" , function() {
               // alert($('.selected_lang').val());
               // $('.legal_domain_langs').append("");
               // $('.legal_domain_langs').append();
            // });




            // Language Translator
                var transLang = $('.trans_lang');
                var trans_lang_wrap = $('.trans_lang_wrapper');
                var trans_lang_x = 2;

                $(transLang).click(function(){
                var maxField = 4;
                var fieldHTML = `<div class="form-group  row"  id="trans_lang_`+trans_lang_x+`">
                                                            <div class="col-sm-6">
                                                                                        <label>From Language:</label>
                                                                                         <select class="form-control selected_lang_2nd_step " name="from_lang_trans[]"  id="" required>
                                                                                                
                                                                                            </select>
                                                                                    </div>
                                                                                    <div class="col-sm-5">
                                                                                        <label>To Language:</label>
                                                                                         <select class="form-control selected_lang_2nd_step " name="to_lang_trans[]"  id="" required>
                                                                                                
                                                                                            </select>
                                                                                    </div>
                                                            <div class="col-sm-1" style="margin-top: 4%;">
                                                                <a href="javascript:void(0);" class="remove_lang_1 btn btn-sm btn-danger" id=`+trans_lang_x+`><i class="fa fa-times"></i></a>
                                                            </div>
                                                           `;

                if(trans_lang_x <= maxField){
                    trans_lang_x++;
                    $(trans_lang_wrap).append(fieldHTML);
                }else{
                    alert('Maximum options are added');
                }
            });

            $(trans_lang_wrap).on('click', '.remove_lang_1', function(e){
                e.preventDefault();
                $('#trans_lang_'+$(this).attr('id')).remove();
                trans_lang_x--;
            });

            // Content writer lang translator
            var transLang_cw = $('.trans_lang_cw');
                var trans_lang_cw_wrap = $('.trans_lang_cw_wrapper');
                var trans_lang_cw_x = 2;

                $(transLang_cw).click(function(){
                var maxField = 4;
                var fieldHTML = `<div class="form-group  row"  id="trans_lang_cw_`+trans_lang_cw_x+`">
                                                            <div class="col-sm-6">
                                                                                        <label>From Language:</label>
                                                                                         <select class="form-control selected_lang_2nd_step" name="from_lang_trans_cw[]"  id="" required>
                                                                                                
                                                                                            </select>
                                                                                    </div>
                                                                                    <div class="col-sm-5">
                                                                                        <label>To Language:</label>
                                                                                         <select class="form-control selected_lang_2nd_step" name="to_lang_trans_cw[]"  id="" required>
                                                                                                
                                                                                            </select>
                                                                                    </div>
                                                            <div class="col-sm-1" style="margin-top: 4%;">
                                                                <a href="javascript:void(0);" class="remove_lang_2 btn btn-sm btn-danger" id=`+trans_lang_cw_x+`><i class="fa fa-times"></i></a>
                                                            </div>
                                                           `;

                if(trans_lang_cw_x <= maxField){
                    trans_lang_cw_x++;
                    $(trans_lang_cw_wrap).append(fieldHTML);
                }else{
                    alert('Maximum options are added');
                }
            });

            $(trans_lang_cw_wrap).on('click', '.remove_lang_2', function(e){
                e.preventDefault();
                $('#trans_lang_cw_'+$(this).attr('id')).remove();
                trans_lang_cw_x--;
            });



            // Journalistic Work Language Translator
            var transLang_jw = $('.trans_lang_jw');
                var trans_lang_jw_wrap = $('.trans_lang_jw_wrapper');
                var trans_lang_jw_x = 2;

                $(transLang_jw).click(function(){
                var maxField = 4;
                var fieldHTML = `<div class="form-group  row"  id="trans_lang_jw_`+trans_lang_jw_x+`">
                                                            <div class="col-sm-6">
                                                                                        <label>From Language:</label>
                                                                                         <select class="form-control selected_lang_2nd_step" name="from_lang_trans_jw[]"  id="" required>
                                                                                                
                                                                                            </select>
                                                                                    </div>
                                                                                    <div class="col-sm-5">
                                                                                        <label>To Language:</label>
                                                                                         <select class="form-control selected_lang_2nd_step" name="to_lang_trans_jw[]"  id="" required>
                                                                                                
                                                                                            </select>
                                                                                    </div>
                                                            <div class="col-sm-1" style="margin-top: 4%;">
                                                                <a href="javascript:void(0);" class="remove_lang_3 btn btn-sm btn-danger" id=`+trans_lang_jw_x+`><i class="fa fa-times"></i></a>
                                                            </div>
                                                           `;

                if(trans_lang_jw_x <= maxField){
                    trans_lang_jw_x++;
                    $(trans_lang_jw_wrap).append(fieldHTML);
                }else{
                    alert('Maximum options are added');
                }
            });

            $(trans_lang_jw_wrap).on('click', '.remove_lang_3', function(e){
                e.preventDefault();
                $('#trans_lang_jw_'+$(this).attr('id')).remove();
                trans_lang_jw_x--;
            });



                // Fundraising Work Language Translator
            var transLang_fw = $('.trans_lang_fw');
                var trans_lang_fw_wrap = $('.trans_lang_fw_wrapper');
                var trans_lang_fw_x = 2;

                $(transLang_fw).click(function(){
                var maxField = 4;
                var fieldHTML = `<div class="form-group  row"  id="trans_lang_fw_`+trans_lang_fw_x+`">
                                                            <div class="col-sm-6">
                                                                                         <select class="form-control selected_lang_2nd_step" name="from_lang_trans_fw[]"  id="" required>
                                                                                                
                                                                                            </select>
                                                                                    </div>
                                                                                    <div class="col-sm-5">
                                                                                         <select class="form-control selected_lang_2nd_step" name="to_lang_trans_fw[]"  id="" required>
                                                                                                
                                                                                            </select>
                                                                                    </div>
                                                            <div class="col-sm-1" style="">
                                                                <a href="javascript:void(0);" class="remove_lang_4 btn btn-sm btn-danger" id=`+trans_lang_fw_x+`><i class="fa fa-times"></i></a>
                                                            </div>
                                                           `;

                if(trans_lang_fw_x <= maxField){
                    trans_lang_fw_x++;
                    $(trans_lang_fw_wrap).append(fieldHTML);
                }else{
                    alert('Maximum options are added');
                }
            });

            $(trans_lang_fw_wrap).on('click', '.remove_lang_4', function(e){
                e.preventDefault();
                $('#trans_lang_fw_'+$(this).attr('id')).remove();
                trans_lang_fw_x--;
            });

            // function my_qualification(element){
            //     alert($(this).val());
            // }

            var counter = 0;
            $('.my_qualification').on('click', function(){

                    var val = $(this).val();
                    if(val == "legal_domain"){
                        $('.legal_option_err').remove();
                        if($(this).prop("checked")){
                            ++counter;
                            $('.legal_domain_details').slideDown();
                        }else{
                            --counter;
                            $('.legal_domain_details').slideUp();
                        }
                    }
                    if(val == "content_writing"){
                        $('.content_writing_option_err').remove();
                            if($(this).prop("checked")){
                                ++counter;
                                                    $('.content_writing_details').slideDown();
                            }
                            else{
                                --counter;
                                                    $('.content_writing_details').slideUp();
                            }

                    }if(val == "journal_work"){
                        $('.journal_work_option_err').remove();
                            if($(this).prop("checked")){
                                ++counter;
                                                    $('.journal_work_details').slideDown();
                            }
                            else{
                                --counter;
                                                    $('.journal_work_details').slideUp();
                            }

                    }if(val == "fund_raising"){
                        $('.fund_raising_option_err').remove();
                            if($(this).prop("checked")){
                                ++counter;
                                                    $('.fund_raising_details').slideDown();
                            }
                            else{
                                --counter;
                                                    $('.fund_raising_details').slideUp();
                            }

                    }if(val == "social_media_mobilization"){
                            if($(this).prop("checked")){
                                ++counter;
                                                    $('.social_media_mobilization_details').slideDown();
                            }
                            else{
                                --counter;
                                                    $('.social_media_mobilization_details').slideUp();
                            }

                    }if(val == "general_admin"){
                            if($(this).prop("checked")){
                                ++counter;
                                                    $('.general_admin_details').slideDown();
                            }
                            else{
                                --counter;
                                                    $('.general_admin_details').slideUp();
                            }

                    }if(val == "info_tech"){
                        $('.info_tech_option_err').remove();
                            if($(this).prop("checked")){
                                ++counter;
                                                    $('.info_tech_details').slideDown();
                            }
                            else{
                                --counter;
                                                    $('.info_tech_details').slideUp();
                            }

                    }if(val == "accounts"){
                        $('.accounts_option_err').remove();
                        if($('#country').val() == 'India' && $('#citizenship_country').val() == 'India'){
                            if($(this).prop("checked")){
                                ++counter;
                                                    $('.accounts_details').slideDown();
                            }
                            else{
                                --counter;
                                                    $('.accounts_details').slideUp();
                            }
                        }

                    }if(val == "complainces"){
                        $('.complainces_option_err').remove();
                        if($('#country').val() == 'India' && $('#citizenship_country').val() == 'India'){
                            if($(this).prop("checked")){
                                ++counter;
                                                    $('.complainces_details').slideDown();
                            }
                            else{
                                --counter;
                                                    $('.complainces_details').slideUp();
                            }
                        }

                    }if(val == "expert_opinion"){
                        $('.expert_option_err').remove();
                            if($(this).prop("checked")){
                                ++counter;
                                                    $('.expert_opinion_details').slideDown();
                            }
                            else{
                                --counter;
                                                    $('.expert_opinion_details').slideUp();
                            }

                    }if(val == "other"){
                        $('.other_option_err_msg').remove();
                            if($(this).prop("checked")){
                                ++counter;
                                                    $('.other_details').slideDown();
                            }
                            else{
                                --counter;
                                                    $('.other_details').slideUp();
                            }
                    }
            });

            $('.legal_domain_options').on('click', function(){
                var op = $(this).val();
                 if(op == "legal_other"){
                    if($(this).prop("checked")){
                        $('#other_legal_domain').slideDown();
                    }else{
                        $('#other_legal_domain').slideUp();
                    }
                }
                 if(op == "legal_drafting"){
                    if($(this).prop("checked")){
                        $('#legal_drafting_legal_domain').slideDown();
                    }else{
                        $('#legal_drafting_legal_domain').slideUp();
                    }
                }

                 if(op == "language_translator"){
                    if($(this).prop("checked")){
                        $('#legal_domain_lang_translator').slideDown();
                    }else{
                        $('#legal_domain_lang_translator').slideUp();
                    }
                }
            });

            $('.legal_drafting_options').on('click', function(){
                var op = $(this).val();
                 if(op == "other_side_draft"){
                    if($(this).prop("checked")){
                        $('#legal_drafting_other').slideDown();
                    }else{
                        $('#legal_drafting_other').slideUp();
                    }
                }
            });

            $('.other_content_writing').on('click', function(){
                var op = $(this).val();
                 if(op == "other_content_writing"){
                    if($(this).prop("checked")){
                        $('#other_law_legal_content').slideDown();
                    }else{
                        $('#other_law_legal_content').slideUp();
                    }
                }
            });

            $('.content_writing_options').on('click', function(){
                var op = $(this).val();
                 if(op == "content_writer"){
                    if($(this).prop("checked")){
                        $('#content_writer_content_writing').slideDown();
                    }else{
                        $('#content_writer_content_writing').slideUp();
                    }
                }
                 if(op == "content_writer_lang_trans"){
                    if($(this).prop("checked")){
                        $('#content_writer_lang').slideDown();
                    }else{
                        $('#content_writer_lang').slideUp();
                    }
                }
                 if(op == "other"){
                    if($(this).prop("checked")){
                        $('#other_content_writer').slideDown();
                    }else{
                        $('#other_content_writer').slideUp();
                    }
                }
            });


            $('#something_else_to_share').on('click', function(){
                var op = $(this).val();
                 if(op == "Yes"){
                        $('#write_something_else_othr').css('display', 'block');
                        $('#write_something_else').prop('required', true);
                }else{
                        $('#write_something_else_othr').css('display', 'none');
                        $('#write_something_else').prop('required', false);


                        $('.write_something_else').val("");
                        $('.write_something_else').removeClass('error');
                        $('label[for=write_something_else]').remove();
                }

            });


            $('#journal_work_other').on('click', function(){
                var op = $(this).val();
                 if(op == "journal_work_other"){
                     if($(this).prop("checked")){
                        $('.journal_work_other_write').slideDown();
                    }else{
                        $('.journal_work_other_write').val('');
                        $('.journal_work_other_write').slideUp();
                    }
                }

            });


            $('#journal_work_lang_translator').on('click', function(){
                var op = $(this).val();
                 if(op == "journal_work_lang_translator"){
                     if($(this).prop("checked")){
                        $('#journalistic_Work_lang').slideDown();
                    }else{
                        $('#journalistic_Work_lang').slideUp();
                    }
                }
            });


            $('#Advocate_Lawyer_practice_in').change(function(){
                    var value = $(this).val();
                    if($.inArray("Others", value) != '-1')
                    {
                        $('.Advocate_Lawyer_practice_in_depend').slideDown();
                        $('.Advocate_Lawyer_practice_in_other').prop('required',true);
                    }else{
                        $('.Advocate_Lawyer_practice_in_depend').slideUp();
                        $('.Advocate_Lawyer_practice_in_other').prop('required',false);

                        $('.Advocate_Lawyer_practice_in_other').val("");
                        $('.Advocate_Lawyer_practice_in_other').removeClass('error');
                        $('label[for=Advocate_Lawyer_practice_in_other]').remove();

                    }
            });

            $('#Advocate_Lawyer_practicing').change(function(){
                    var value = $(this).val();
                    if($.inArray("Others", value) != '-1')
                    {
                        $('.Advocate_Lawyer_practicing_depend').slideDown();
                        $('.Advocate_Lawyer_practicing_other').prop('required',true);
                    }else{
                        $('.Advocate_Lawyer_practicing_depend').slideUp();
                        $('.Advocate_Lawyer_practicing_other').prop('required',false);

                        $('.Advocate_Lawyer_practicing_other').val("");
                        $('.Advocate_Lawyer_practicing_other').removeClass('error');
                        $('label[for=Advocate_Lawyer_practicing_other]').remove();

                    }
            });


            $('#Law_Student_Activist_check').change(function(){
                    var value = $(this).val();
                    if($.inArray("Others", value) != '-1')
                    {
                        $('.Law_Student_Activist_check_depend').slideDown();
                        $('.Law_Student_Activist_work_other').prop('required',true);
                    }else{
                        $('.Law_Student_Activist_check_depend').slideUp();
                        $('.Law_Student_Activist_work_other').prop('required',false);

                        $('.Law_Student_Activist_work_other').val("");
                        $('.Law_Student_Activist_work_other').removeClass('error');
                        $('label[for=Law_Student_Activist_work_other]').remove();

                    }
            });

            $('#Journalist_check').change(function(){
                    var value = $(this).val();
                    if($.inArray("Others", value) != '-1')
                    {
                        $('.Journalist_check_depend').slideDown();
                        $('.Journalist_work_other').prop('required',true);
                    }else{
                        $('.Journalist_check_depend').slideUp();
                        $('.Journalist_work_other').prop('required',false);

                        $('.Journalist_work_other').val("");
                        $('.Journalist_work_other').removeClass('error');
                        $('label[for=Journalist_work_other]').remove();

                    }
            });


            $('#Writer_check').change(function(){
                    var value = $(this).val();
                    if($.inArray("Others", value) != '-1')
                    {
                        $('.Writer_check_depend').slideDown();
                        $('.Writer_work_other').prop('required',true);
                    }else{
                        $('.Writer_check_depend').slideUp();
                        $('.Writer_work_other').prop('required',false);

                        $('.Writer_work_other').val("");
                        $('.Writer_work_other').removeClass('error');
                        $('label[for=Writer_work_other]').remove();

                    }
            });

            $('#Retired_Judge_check').change(function(){
                    var value = $(this).val();
                    if(value == "Others")
                    {
                        $('.Retired_Judge_check_depend').slideDown();
                        $('.Retired_Judge_from_other').prop('required',true);
                    }else{
                        $('.Retired_Judge_check_depend').slideUp();
                        $('.Retired_Judge_from_other').prop('required',false);

                        $('.Retired_Judge_from_other').val("");
                        $('.Retired_Judge_from_other').removeClass('error');
                        $('label[for=Retired_Judge_from_other]').remove();

                    }
            });


            $('#Retired_Bureaucrat_check').change(function(){
                    var value = $(this).val();
                    if(value == "Others")
                    {
                        $('.Retired_Bureaucrat_check_depend').slideDown();
                        $('.Retired_Bureaucrat_as_other').prop('required',true);
                    }else{
                        $('.Retired_Bureaucrat_check_depend').slideUp();
                        $('.Retired_Bureaucrat_as_other').prop('required',false);

                        $('.Retired_Bureaucrat_as_other').val("");
                        $('.Retired_Bureaucrat_as_other').removeClass('error');
                        $('label[for=Retired_Bureaucrat_as_other]').remove();

                    }
            });


            $('#medical_practicing').change(function(){
                    var value = $(this).val();
                    if(value == "Others")
                    {
                        $('.medical_practice_depend').slideDown();
                        $('.medical_practitioner_as_other').prop('required',true);
                    }else{
                        $('.medical_practice_depend').slideUp();
                        $('.medical_practitioner_as_other').prop('required',false);
                        $('.medical_practitioner_as_other').val("");
                        $('.medical_practitioner_as_other').removeClass('error');
                        $('label[for=medical_practitioner_as_other]').remove();
                    }
            });



            $('#fund_raising_work_other').on('click', function(){
                var op = $(this).val();
                 if(op == "fund_raising_work_other"){
                     if($(this).prop("checked")){
                        $('#fund_raiser_other_write').slideDown();
                    }else{
                        $('#fund_raiser_other_write').slideUp();
                    }
                }
            });

            $('#fund_raising_lang_translator').on('click', function(){
                var op = $(this).val();
                 if(op == "fund_raising_lang_translator"){
                     if($(this).prop("checked")){
                        $('#fundraising_Work_lang').slideDown();
                    }else{
                        $('#fundraising_Work_lang').slideUp();
                    }
                }
            });

            $('#information_tech_work_other').on('click', function(){
                var op = $(this).val();
                 if(op == "information_tech_work_other"){
                     if($(this).prop("checked")){
                        $('#info_tech_other_write').slideDown();
                    }else{
                        $('#info_tech_other_write').slideUp();
                    }
                }
            });



            $('#accounts_work_other').on('click', function(){
                var op = $(this).val();
                 if(op == "accounts_work_other"){
                     if($(this).prop("checked")){
                        $('#accounts_other_write').slideDown();
                    }else{
                        $('#accounts_other_write').slideUp();
                    }
                }
            });



            $('#complainces_other').on('click', function(){
                var op = $(this).val();
                 if(op == "complainces_other"){
                     if($(this).prop("checked")){
                        $('#complainces_other_write').slideDown();
                    }else{
                        $('#complainces_other_write').slideUp();
                    }
                }
            });


            $('#expert_op_other').on('click', function(){
                var op = $(this).val();
                 if(op == "expert_op_other"){
                     if($(this).prop("checked")){
                        $('#expert_op_other_write').slideDown();
                    }else{
                        $('#expert_op_other_write').slideUp();
                    }
                }
            });







            $('#accounts_chartard_Accountant').on('click', function(){
                     if($('#accounts_Cost_Accountant').prop("checked") == true){
                        Swal.fire('Chartard Accountant and Cost Accountant Cannot be selected together', '', 'error');
                        $(this).prop("checked", false) ;
                    }
            });


            $('#accounts_Cost_Accountant').on('click', function(){
                     if($('#accounts_chartard_Accountant').prop("checked") == true){
                        Swal.fire('Chartard Accountant and Cost Accountant Cannot be selected together', '', 'error');
                        $(this).prop("checked", false) ;
                    }
            });








            $('#send_otp').on('click', function(){
                        var mobile_no_for_otp = $('#phone_number_for_otp').val();
                        
                        if(mobile_no_for_otp.length == 16){
                                var chk_mb_nm = mobile_no_for_otp.replace(/_/g,"");
                                if(chk_mb_nm.length < 6 ){
                                    $('.phone_number_limit_otp_section').remove();
                                    // $('.phone_number_limit_otp_section').css('display','block');
                                     $('.phone_num_error_showing_otp_section').append(`<label
                                                         class="error_others phone_number_limit_otp_section"
                                                        style="color:Red">Minimum Numbers should be 6</label>`);
                                     return false;
                                }
                                else{
                                    // console.log('inside phone num else');
                                    // isValid = true;
                                    $('.phone_number_limit_otp_section').remove();
                                }
                        }
                        

                        if(mobile_no_for_otp.length > 0){
                            if(confirm('Is this your correct Mobile Number for Receiving OTP Code?')){
                                    $.ajax({
                                        type: "GET",
                                        url: "{{route('send_otp_sms')}}",
                                        data: {_token: CSRF_TOKEN, mobile_no_for_otp: mobile_no_for_otp},
                                        success: function(response){
                                            alert('OTP Code has been sent to your Mobile Number');
                                        }
                                    });
                            }else{
                                return false;
                            }
                        }else{
                            alert('Please enter your mobile Number');
                        }

                });

            $('#verify_otp').on('click', function(){
                        var mobile_no_for_otp = $('#phone_number_for_otp').val();
                        var mobile_no_otp = $('#otp_generated').val();

                        if(mobile_no_for_otp.length > 0 && mobile_no_otp.length > 0){
                            if(confirm('Have you entered your correct OTP?')){
                                    $.ajax({
                                        type: "GET",
                                        url: "{{route('match_otp_sms')}}",
                                        data: {_token: CSRF_TOKEN, mobile_no_for_otp: mobile_no_for_otp,mobile_no_otp:mobile_no_otp},
                                        success: function(response){
                                            // alert('OTP Code has been sent to your Mobile Number');
                                            if(response.length > 0){
                                                // alert('OTP Verified');
                                                    $('#otp_success').css('display','block');
                                                    setTimeout(function() {
                                                            $("#otp_success").fadeOut(1500);
                                                        }, 2000);
                                                    $('.otp_verified').slideUp();
                                                    $('.submit_btn').slideDown();
                                            }else{
                                                // alert('OTP not verified, please enter ')
                                                    $('#otp_error').css('display','block');
                                                    setTimeout(function() {
                                                            $("#otp_error").fadeOut(1500);
                                                        }, 2000);
                                            }
                                        }
                                    });
                            }else{
                                return false;
                            }
                        }else{
                            alert('Please enter your OTP Code');
                        }

                });

            
            // $('.check_step_click').hover(function(e){
            //     $('.check_step_click').css('pointer-events','none');
            // });




            var qualification_count = 0;
            $('.my_qualification').on('click', function(){
                if($(this).prop( "checked")){
                    $(this).removeClass('un_checked_qualification');
                    qualification_count++;
                }

                if(!$(this).prop( "checked")){
                    $(this).addClass('un_checked_qualification');
                    qualification_count--;
                }

                if(qualification_count == 4){
                    $('.un_checked_qualification').prop('disabled', true);
                }else{
                    $('.un_checked_qualification').prop('disabled', false);
                }

                // console.log(qualification_count);
            });

            });
    </script>

    @yield('javascript')

</body>


</html>
