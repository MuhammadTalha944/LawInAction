@extends('layouts.website.app')
@section('title', 'Hate Form Creations')
@section('content')


    <div class="jumbotron text-center">
        <h2>Register Hate-Form</h2>
    </div>
  
<div class="container" style="margin-bottom: 2%;">
  <div class="row">
    <div class="col-sm-12"  >
      <div class="card">
        <h3 style="text-align: left; padding: 2%;">Hate-Form</h3>
        <div class="card-body setup-content" style="padding: 2%;">
            <form method="POST" action="{{ route('hateForm.store') }}"  enctype="multipart/form-data" id="form">
              @csrf
                            <div class="other_country">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Name</label>
                                        <input id="name" type="text" class="form-control" name="name"   placeholder="Name" required >
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Mobile number</label>
                                        <input id="phone_number" type="text" class="form-control" name="phone_number"   placeholder="Phone Number" required 
                                        data-inputmask="'mask': '+999999999999'" >
                                    </div>
                                                        
                                </div>
                                
                                <div class="form-group row">
                                    
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Email</label>
                                        <input id="email" type="email" class="form-control" name="email"    placeholder="Email" required>
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
                                 <div class="form-group row">
                                    <div class="col-sm-12 mb-6 mb-sm-0">
                                        <label>Describe Hate Content</label>
                                        <textarea name="hate_content" class="form-control" rows="2" required></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <!-- <div class="col-sm-10">
                                        <label>Please Provide Hate Content Links</label>
                                            <input type="text" class="form-control" name="hate_content_url"    placeholder="Hate Content URL" required>
                                    </div>
                                    <div class="col-sm-2">
                                            <a href="javascript:void(0)" 
                                                class="btn  btn-primary" 
                                            >
                                                Add More
                                            </a>
                                    </div> -->
                                    <div class="col-sm-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Links</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="links_wrapper">
                                                <tr>
                                                    <th>1</th>
                                                    <td>
                                                        <input type="text" class="form-control" name="hate_content_url[]"    placeholder="Hate Content URL" required>
                                                    </td>
                                                    <td style="
                                                    text-align: center;
                                                    ">
                                                        <a href="javascript:void(0)" class="btn btn-sm btn-primary add_link" >
                                                           <i class="fa fa-plus"></i> Add More
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    

                                </div>

                                

                                <div class="form-group row">
                                        <div class="col-sm-4">
                                             <label>Confidentiality</label>
                                            <select class="form-control " name="confidentiality"  id="confidentiality" required>
                                                <option value="">Select Option</option>
                                                <option value="Public">Public</option>
                                                <option value="Private">Private</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Do you know the offender</label>
                                            <select class="form-control " name="offender_check"  id="offender_check" required>
                                                <option value="">--Select Option--</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Are you an Indian Citizen:</label>
                                            <select class="form-control " name="citizenship"  id="citizenship" required>
                                                <option value="">Select Option</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group row offender_details" id="offender_details" style="display: none;"> 
                                    <div class="col-sm-12 mb-6 mb-sm-0">
                                        <label>Please provide his/her/their details : </label>
                                            <textarea class="form-control" name="offender_details" rows="2"></textarea>
                                    </div>
                                </div>

                                    <div class="form-group row " >
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="checkbox" name="verify" class="" required>
                                            <label> I verify that all of my information is true!</label>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="checkbox" name="concent" class="" required>
                                            <label>I give concent that my information can be used for this Hate Form.</label>
                                        </div>
                                    </div>
           
                                        <input type="hidden" id="csrf" value="{{Session::token()}}">
                                    <div style="text-align: right;">
                                     <button type="submit" class="btn btn-yellow submitBtn" style="width: 100%;">Submit</button> 
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


                CSRF_TOKEN   = "{{ csrf_token() }}";
                $('#country').change(function(){ 
                    var country = $(this).val();
                    if(country == 'other'){
                            $('.other_country').slideUp();
                            $('.other_country_text').slideDown();
                    }else if(country == 'India'){
                            $('.other_country').slideDown();
                            $('.other_country_text').slideUp();
                    }
                });
                $('#change_country').on('click',function(){
                            $('.other_country').slideDown();
                            $('.other_country_text').slideUp();
                            $('#form').trigger("reset");
                });


                $('#offender_check').on('click',function(){
                        
                        var offender = $(this).val();
                        if(offender == 'Yes'){
                            $('#offender_details').slideDown();
                        }else{
                            $('#offender_details').slideUp();
                        }

                });

                


            //Form Validation
              submitBtn = $('.submitBtn');
               submitBtn.click(function(){
                    var curStep = $(this).closest(".setup-content"),
                        curStepBtn = curStep.attr("id"),
                        nextStepWizard = $('.submitBtn'),
                        curInputs = curStep.find("input,select,textarea"),
                        isValid = true;

                    $(".form-control ").removeClass("has-error");
                    for(var i=0; i<curInputs.length; i++){
                        if (!curInputs[i].validity.valid){
                            isValid = false;
                            $(curInputs[i]).closest(".form-control ").addClass("has-error");
                        }
                    }

                    if (isValid)
                        nextStepWizard.removeAttr('disabled').trigger('click');
                });

        var addLink = $('.add_link');
        var links = $('.links_wrapper');
        var links_x = 2;

        //Links
            $(addLink).click(function(){
                var maxField = 10;
                var fieldHTML = `<tr  id="photo_`+links_x+`">
                          <th scope="row">`+ links_x+`</th>
                          <td><input placeholder="Hate Content URL" type="text" name="hate_content_url[]" class="form-control" required></td>
                          <td style="text-align:center"><a href="javascript:void(0);" class="remove_photo btn btn-sm btn-danger" id=`+links_x+`><i class="fa fa-times"></i> Remove</a></td>
                        </tr>`;
                
                if(links_x <= maxField){ 
                    links_x++;
                    $(links).append(fieldHTML);
                }else{
                    alert('Maximum Link fields are added');
                }
            });
            
            $(links).on('click', '.remove_photo', function(e){
                e.preventDefault();
                $('#photo_'+$(this).attr('id')).remove();
                links_x--;
            });
                  

          });
</script>
@endsection
