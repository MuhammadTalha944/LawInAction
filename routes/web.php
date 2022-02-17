<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'WebsiteController@index')->name('website_home');


Auth::routes(['verify' => true]);
// Auth::routes();
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
Route::post('/add_new_password', 'Auth\RegisterController@add_new_pwd')->name('password.add.new');


// Email Verification Routes
Route::get('/email-verification','Auth\RegisterController@email_verification')->name('email-verification');
Route::get('/email-verification-done','Auth\VerificationController@email_verification_done')->name('email-verification-done');
Route::get('send-link-again', 'Auth\LoginController@send_email_link')->name('send.verification.link.again');
Route::post('link_email', 'Auth\LoginController@link_email')->name('link.email');


Route::get('/home', 'HomeController@index')->name('home');


    Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');

    //Membership funtionalities
    Route::get('user-evaluate/{id}','UserController@evaluate_user')->name('users.evaluate');
    Route::post('user-evaluate/{id}','UserController@evaluate_user')->name('users.evaluate');
    Route::post('user_verify/{id}','UserController@user_verify')->name('user.verify');

    Route::resource('permissions','permissionController');

    //News Section
    Route::resource('news','NewsController');
    Route::get('sendToEditor/{id}','NewsController@sendToEditor')->name('news.send.toeditor');
    Route::get('sendToProofReader/{id}','NewsController@sendToProofReader')->name('send.to.proofreader');
    Route::post('sendBackToEditor','NewsController@sendBackToEditor')->name('send.back.to.editor');
    Route::get('sendToTranslator/{id}','NewsController@sendToTranslator')->name('send.to.translator');
    Route::get('publish_news/{id}', 'NewsController@publish_news')->name('publish.news');
    Route::get('unpublish_news/{id}', 'NewsController@unpublish_news')->name('unpublish.news');

    //Blogs
    Route::resource('blogs','BlogsController');
    Route::get('blogs/custom-delete/{$id}','BlogsController@destroy')->name('blogs.custom.delete');

    //knowledge
    Route::resource('knowledge','BlogsController');

    //Comlaint and redressels
    Route::resource('complaint_section','ComplaintsDashboardController');
    Route::resource('hateform_section','HateFDashboardController');
    Route::post('complaint_redressal','ComplaintsDashboardController@redressal')->name('complaint_section.redressal');
    Route::post('hateform_section','HateFDashboardController@redressal')->name('hateform_section.redressal');
    Route::post('hateform_section/store','HateFDashboardController@store')->name('hateform_section.store');


    //Polls Section
    Route::resource('polls','PollsController');
    Route::get('send_poll_to_editor/{id}', 'PollsController@send_poll_to_editor')->name('send.poll.to.editor');
    Route::get('send_poll_to_proofreader/{id}', 'PollsController@send_poll_to_proofreader')->name('send.poll.to.proofreader');
    Route::get('send_poll_to_translator/{id}/{lang_type}', 'PollsController@send_poll_to_translator')->name('send.poll.to.translator'); 
    Route::get('publish_poll/{id}', 'PollsController@publish_poll')->name('publish.poll');
    Route::get('unpublish_poll/{id}', 'PollsController@unpublish_poll')->name('unpublish.poll');
    Route::post('backtoeditor_poll_question','PollsController@backtoeditor_poll_question')->name('backtoeditor.poll.question');
    Route::get('polls_reactions_list/{id}', 'PollsController@polls_reactions_list')->name('polls.reactions.list');

    //Campaign Section
    Route::resource('campaign','CampaignController');
    Route::get('send_campaign_to_editor/{id}', 'CampaignController@send_campaign_to_editor')->name('campaign.send_to_editor');
    Route::get('sendToProofReadercamp/{id}','CampaignController@sendToProofReadercamp')->name('send.to.proofreaderCampaign');
    Route::post('sendBackToEditocampr','CampaignController@sendBackToEditocampr')->name('send.back.to.editorCampaign');
    Route::get('sendToTranslatorcamp/{id}','CampaignController@sendToTranslatorcamp')->name('send.to.translatorCampaign');
    Route::get('publish_camp/{id}', 'CampaignController@publish_camp')->name('publish.Campaign');
    Route::get('unpublish_camp/{id}', 'CampaignController@unpublish_camp')->name('unpublish.Campaign');

    Route::get('campaign-story-updates/{id}','CampaignController@campaignStorySection')->name('campaign.story.updates');
    Route::get('campaign-story-add/{id}','CampaignController@campaignStoryAdd')->name('campaign.story.add');
    Route::post('campaign-story-save/{id}','CampaignController@campaignStorySave')->name('campaign.story.update.store');
    Route::get('campaign-story-edit/{id}','CampaignController@campaignStoryEdit')->name('campaign.story.edit');
    Route::post('campaign-story-update/{id}','CampaignController@campaignStoryUpdate')->name('campaign.story_update.update');


    //Campaign Necessery things
    Route::group(['prefix' => 'campaign_section'], function() {
        Route::get('/{type}','CampaignController@necessary_for_campaign')->name('campaign.necessary');
        Route::get('necessary/{type}','CampaignController@necessary_for_campaign_Add')->name('campaign.necessary.add');
        Route::post('necessary/{type}','CampaignController@necessary_for_campaign_Store')->name('campaign.necessary.store');
        Route::get('edit/{id}/{type}','CampaignController@necessary_for_campaign_edit')->name('campaign.necessary.edit');
        Route::put('update/{id}/{type}','CampaignController@necessary_for_campaign_update')->name('campaign.necessary.update');
    });


    //Campaign Donors
    Route::group(['prefix' => 'donor_section'], function() {
        Route::get('certificate_80g','DonorDashboardController@certificate_80g')->name('certificate_80g');
        Route::get('donations','DonorDashboardController@donor_donations')->name('donations');
        Route::get('profile','DonorDashboardController@donor_profile')->name('profile');
        Route::get('profile_update','DonorDashboardController@donor_profile_update')->name('donor.update');

    });
    
});

//Poll routes
Route::post('poll_option_post', 'WebsiteController@poll_option_post')->name('poll.option.post');
Route::get('poll_results_get', 'WebsiteController@poll_results_get')->name('poll.results.get');

//public campaign routes
Route::group(['prefix' => 'campaigns'], function() {
        Route::get('detail/{id}','WebsiteController@detail_of_campaign')->name('campaign.detail');
        Route::get('listing','WebsiteController@list_of_campaign')->name('campaign.listing');
        Route::post('donation_save','WebsiteController@donation_save')->name('donation.save');
        Route::post('comment','WebsiteController@add_donation_comment')->name('donation.add.comment');
    });

Route::get('team','WebsiteController@team')->name('team.index');

//Membership Routes
Route::resource('membership','MembershipController');

//Public Hate Form
Route::resource('hateForm','HateFormController');
Route::group(['prefix' => 'Hate-Form'], function(){
    Route::get('details/{hateform_number}','HateFormController@hateForm_details')->name('hateForm.detail');
    Route::post('comment','HateFormController@add_comment')->name('hateform.add.comment');
    Route::get('status','HateFormController@form_status')->name('hateform.status');

});


//Public Complaints
Route::resource('complaint','ComplaintController');
Route::group(['prefix' => 'complaint'], function(){
    Route::get('details/{complaint_number}','ComplaintController@complaint_details')->name('complaint.detail');
    Route::post('comment','ComplaintController@add_comment')->name('complaint.add.comment');
});
Route::get('complaint_status','ComplaintController@complaint_status')->name('complaint.status');


// Needs
Route::get('get_districts','MembershipController@get_districts')->name('get_districts');


Route::get('news_page','WebsiteController@news_page')->name('news.page');
// Route::post('/submitotp','ComplaintController@submitOtp');
// Route::get('/showresult','ComplaintController@show');


//Charts
Route::get('memberships_data', 'WebsiteController@memberships_data')->name('memberships_data');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');

    echo "Eevery type of cache cleared";

});



// Route::post('/verify', 'LoginController@verify')->name('verify');





//donation
//stripe

Route::get('/campaign/donate-now/{id}/{type}', 'WebsiteController@donate_now')->name('donate.now.campaign');



Route::get('/campaign/donate-now/{id}', 'WebsiteController@donate_now')->name('donate.now');
Route::post('/campaign/donate-now/next-step/{id}', 'WebsiteController@donate_now_next_step')->name('donate.now.next');

Route::post('final-donation', 'WebsiteController@donation_save')->name('final.donate.now');

//Previous
Route::post('stripe', 'WebsiteController@donation_save')->name('stripe.post');


Route::get('send_otp_sms', 'WebsiteController@send_otp_sms')->name('send_otp_sms');
Route::get('match_otp_sms', 'WebsiteController@match_otp_sms')->name('match_otp_sms');



//checking duplications
Route::get('check_membership_email','WebsiteController@check_membership_email')->name('check_membership_email');
Route::get('check_membership_phone_number','WebsiteController@check_membership_phone_number')->name('check_membership_phone_number');

Route::get('check_membership_reg_num','WebsiteController@check_membership_reg_num')->name('check_membership_reg_num');



Route::get('contact-us','WebsiteController@contact_us')->name('contact.index');


Route::get('blogs-home','WebsiteController@blogs')->name('blogs.home');
Route::get('blogs-detail/{id}','WebsiteController@blog_detail')->name('blog.detail.page');
Route::post('comment','WebsiteController@add_comment')->name('add.comment');

