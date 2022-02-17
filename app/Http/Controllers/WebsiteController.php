<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\User;
use App\Membership;
use App\Polls;
use App\Blogs;
use App\PollReactions;
use App\Campaign;
use App\Donation;
use App\DonationComments;
use App\Comments;
use Illuminate\Support\Facades\Hash;
use App\VerifyUser;
use Session;
use Stripe;
use DB;
use Carbon\Carbon;
use Exception;
use Auth;

class WebsiteController extends Controller
{
    public function index(){

        $news = News::with('news_files','user')->where('published','1')->get();
        $poll = Polls::with('user')->where('published','1')->orderBy("id", "desc")->get();
        $campaign = Campaign::with('CampaignAttachments','CampaignCategories','CampaignKeywords','CampaignTags','user')->where('published','1')->get();

        if($poll){
            $poll = $poll->toArray();
        }

        return view('website.index', compact('poll','news','campaign'));
    }

    public function news_page(){
        $news = News::with('news_files','user')->where('published','1')->get();
        // dd($news);
        return view('website.news.index', compact('news'));
    }

    public function memberships_data()
    {
        // $result = User::select(\DB::raw("COUNT(*) as count"))
        //             ->whereYear('created_at', date('Y'))
        //             ->groupBy(\DB::raw("Month(created_at)"))
        //             ->pluck('count');                    

        // $users = User::select(\DB::raw('strftime("%m", created_at) as month, count(id) as total'))
        //     ->whereBetween('created_at', ['2020-01-01 00:00:00', '2020-12-31 23:59:59'])
        //     ->groupBy('month')
        //     ->orderBy('month')
        //     ->pluck('total', 'month')
        //     ->all();

        // $user = User::select(DB::raw('MONTH(created_at) as month'))->groupBy('month')->get()->keyBy('month');
        $users = User::select('id', 'created_at')
            ->get()
            ->groupBy(function($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });

            $usermcount = [];
            $userArr = [];

            foreach ($users as $key => $value) {
                $usermcount[(int)$key] = count($value);
            }

            for($i = 1; $i <= 12; $i++){
                if(!empty($usermcount[$i])){
                    // $userArr[$i] = $usermcount[$i];    
                    array_push($userArr, $usermcount[$i]);
                }else{
                    // $userArr[$i] = 0;    
                    array_push($userArr, 0);
                }
            } 
            // dd($userArr);
        // return response()->json($userArr);
            return $userArr;

    }

    public function poll_option_post(Request $request)
    {
            $polls = new PollReactions();
            $polls->option = $request->vote_option;
            $polls->option_text = $request->option_text;
            $polls->ip = $request->ip();
            $polls->poll_id = $request->poll_id;
            $polls->save();
            return response()->json('Reaction Saved');
    }

    public function poll_results_get(Request $request){
        $yes = PollReactions::where('poll_id', $request->poll_id)->where('option', 0)->get()->count();
        $no = PollReactions::where('poll_id', $request->poll_id)->where('option', 1)->get()->count();
        $not_sure = PollReactions::where('poll_id', $request->poll_id)->where('option', 2)->get()->count();
        $dont_know = PollReactions::where('poll_id', $request->poll_id)->where('option', 3)->get()->count();
        $total = PollReactions::where('poll_id', $request->poll_id)->get()->count();
        $question = Polls::find($request->poll_id);


        $data = [
                'yes' => $yes,
                'no' => $no,
                'not_sure' => $not_sure,
                'dont_know' => $dont_know,
                'total' => $total,
                'question' => $question->question,
                'translated_question' => $question->translated_question
        ];

        return $data;
    }

    public function detail_of_campaign($id)
    {
        $campaign = Campaign::with('CampaignAttachments','CampaignCategories','CampaignKeywords','CampaignTags','user','donation_comments','storyUpdates')->where('published','1')->where('id',$id)->get()->toArray();

        $donations = Donation::with('user')->where('campaign_id', $id)->get();
        $count_received_fund = 0;
        if($donations){
            if(count($donations) > 0){
                foreach($donations as $item){
                    $count_received_fund = $count_received_fund + $item->amount;
                }
            }
        }

        // dd($campaign[0]['campaign_attachments']);
         
        $shareButtons = \Share::page(
            url('/campaigns/detail/'.$id),
            'Come and help needy people'
        )->facebook()->twitter()->whatsapp();

        return view('website.campaign.index', compact('campaign','donations','shareButtons','count_received_fund'));
    }

    public function list_of_campaign()
    {
            $campaign = Campaign::with('CampaignAttachments','CampaignCategories','CampaignKeywords','CampaignTags','user','donation_comments','donation')->where('published','1')->get();

            // dd($campaign[0]);

            return view('website.campaign.listing', compact('campaign'));
    }
    public function donation_save(Request $request)
    {

        // dd($request->all());

         if($request->amount_other){
            $amount =  $request->amount_other;
        }else{
            $amount =  $request->amount;
        }

        $payment_needs = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $payment = Stripe\Charge::create ([
                "amount" => $amount,
                "currency" => $request->currency,
                "source" => $request->stripeToken,
                "description" => "Payment for a Campaign Donation of ID: ".$request->campaign_id." for LiA",
        ]);
        if($payment->status == "succeeded"){
                $user = User::where('email', $request->email)->first();
                if(!$user){

                        $user =  User::create([
                            'name' => $request->name,
                            'email' => $request->email,
                            'phone_number' => $request->phone_number,
                            'password' => 0,
                            'donor' => 1,
                        ]);

                        // $this->sendEmail($user);
                        $verifyUser = VerifyUser::create([
                            'user_id' => $user->id,
                            'token' => sha1(time())
                          ]);
                        \Mail::to($user->email)->send(new \App\Mail\VerifyMail($user));
                }

                $donate = new Donation();
                $donate->campaign_id = $request->campaign_id;
                $donate->mode = $request->mode;
                $donate->currency = $request->currency;
                $donate->amount = $amount;
                $donate->name = $request->name;
                $donate->email = $request->email;
                $donate->mobile = $request->mobile;
                $donate->personal_number = $request->personal_number;
                $donate->g_certificate = $request->certificate;
                $donate->user_id =  $user->id;
                $donate->anonymous =  $request->anonymous_mode;
                $donate->save();
                
                return redirect()->route('campaign.detail', $request->campaign_id)->with('success','Thanks, Your Donation is done Successfully');
        }else{
                return redirect()->route('campaign.detail', $request->campaign_id)->with('error','And error Occured, please try again');
        }
    }

    public function sendEmail($thisUser){
        \Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }

    public function team()
    {
        return view('website.team');
    }

        public function  add_donation_comment(Request $request)
    {
                $comments = new DonationComments();
                $comments->name = $request->name;
                $comments->email = $request->email;
                $comments->comment = $request->comment;
                $comments->campaign_id = $request->campaign_id;
                $comments->save();
                // return $comments;

            $all_Comments = DonationComments::where('campaign_id', $request->campaign_id)->get()->toArray();
            return response()->json($all_Comments);

    }

    public function send_otp_sms(Request $request){

        $mobile_num = $request->mobile_no_for_otp;
        $mobile_num = str_replace('_', '', $mobile_num);

        $otp = rand(1000,9999);
        
        try {
            $basic  = new \Nexmo\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));
            $client = new \Nexmo\Client($basic);
            $receiverNumber = $mobile_num;
            $content = "Your OTP Code for LiA registration is ".$otp.". Enter this to register your account. Please dont share this with anyone.";
            $message = $client->message()->send([
                'to' => $receiverNumber,
                'from' => 'LiA',
                'text' => $content
            ]);

            $check = DB::table('mobile_num_otp_codes')->where('mobile_num', $mobile_num)->first();
                
                if($check){
                    $values = array('otp_code' => $otp);
                    DB::table('mobile_num_otp_codes')->where('mobile_num', $mobile_num)->update($values);    
                }else{
                    $values = array('mobile_num' => $mobile_num,'otp_code' => $otp);
                    DB::table('mobile_num_otp_codes')->insert($values);
                }

            return 1;
        } catch (Exception $e) {
            return 0;
        }

    }

    public function match_otp_sms(Request $request){

        $mobile_num = $request->mobile_no_for_otp;
        $mobile_num = str_replace('_', '', $mobile_num);
        
        $otp = $request->mobile_no_otp;

            $values = array('mobile_num' => $mobile_num,'otp_code' => $otp);
            $check = DB::table('mobile_num_otp_codes')->where($values)->get();
            return $check;
            
    }

    public function check_membership_email(Request $request){
        $email = User::where('email', $request->email)->get();

        if($email){
            if (count($email) > 0) {
                return response()->json("Email Already registered.");
            }    
        }
        
        return response()->json("true");
    }

    public function check_membership_phone_number(Request $request){
        $phone_number = Membership::where('mobile', $request->phone_number)->get();

        if($phone_number){
            if (count($phone_number) > 0) {
                return response()->json("Phone Number already registered.");
            }    
        }
        
        return response()->json("true");
    }

    public function check_membership_reg_num(Request $request){
        $reg_num = Membership::where('Advocate_Lawyer_pin_code', $request->Advocate_Lawyer_pin_code)->get();

        if($reg_num){
            if (count($reg_num) > 0) {
                return response()->json("Reg. Number already registered.");
            }    
        }
        
        return response()->json("true");
    }


    public function contact_us(){
        return view('website.contact');
    }

    public function donate_now($id, $type = ''){
        
        if($type == 'paytm'){
            return redirect()->back();
        }

        $campaign = Campaign::with('CampaignAttachments','CampaignCategories','CampaignKeywords','CampaignTags','user','donation_comments')
            ->where('published','1')
            ->where('id',$id)
            ->get()->toArray();
        $donations = Donation::with('user')->where('campaign_id', $id)->get();
        return view('website.campaign.donate', compact('campaign','donations', 'type'));
    }
    function donate_now_next_step(Request $request, $id){
        $details = $request->all();
        $campaign = Campaign::with('CampaignAttachments','CampaignCategories','CampaignKeywords','CampaignTags','user','donation_comments')
            ->where('published','1')
            ->where('id',$id)
            ->get()->toArray();
        return view('website.campaign.donate_nextstep', compact('details','campaign'));
    }

    public function blogs(){
        $blogs = Blogs::with('blog_files','user')->get();
        return view('website.blogs.index', compact('blogs'));
    }

    public function blog_detail($id){
        
        $blog = Blogs::find($id);
        $blogs = Blogs::with('blog_files','user')->orderBy('id','DESC')->limit(3)->get();
        return view('website.blogs.detail', compact('blog','blogs'));   
    
    }
    
    public function  add_comment(Request $request)
    {
        
                $comments = new Comments();
                $comments->name = $request->name;
                $comments->email = $request->email;
                $comments->comment = $request->comment;
                $comments->parent_id = $request->parent_id;
                $comments->type = $request->type;
                $comments->save();

            $all_Comments = Comments::where(['parent_id'=> $request->parent_id, 'type'=> $request->type,])->get()->toArray();
            return response()->json($all_Comments);

    }

    
}
