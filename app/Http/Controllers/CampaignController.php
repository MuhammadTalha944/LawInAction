<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\CampaignCategories;
use App\CampaignKeywords;
use App\CampaignTags;
use App\CampaignAttachments;
use App\CampaignStoryUpdate;
use Illuminate\Http\Request;
use Auth;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaign = Campaign::with('CampaignAttachments','CampaignCategories','CampaignKeywords','CampaignTags','user')->get();
        return view('campaign.index', compact('campaign'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $CampaignCategories = CampaignCategories::all();
        $CampaignKeywords = CampaignKeywords::all();
        $CampaignTags = CampaignTags::all();

        return view('campaign.create', compact('CampaignCategories','CampaignKeywords','CampaignTags'));
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
        $campaign = new Campaign();
            $campaign->campaign_categories_id = $request->campaign_categories_id;
            $campaign->campaign_tags_id = $request->campaign_tags;
            $campaign->campaign_keywords_id = $request->campaign_keywords;
            $campaign->fund_req = $request->fund_req;
            $campaign->amount = $request->amount;
            $campaign->campaing_end_time = $request->campaing_end_time;
            $campaign->campaign_date = $request->campaign_date;
            $campaign->camp_end_date = $request->camp_end_date;
            $campaign->beneficiary_details = $request->beneficiary_details;
            $campaign->story_heading = $request->story_heading;
            $campaign->story_sub_heading = $request->story_sub_heading;
            $campaign->story = $request->story;
            $campaign->testimonial_heading = $request->testimonial_heading;
            $campaign->testimonial_sub_heading = $request->testimonial_sub_heading;
            $campaign->testimonial = $request->testimonial;
            $campaign->document_heading = $request->document_heading;
            $campaign->document_sub_heading = $request->document_sub_heading;
            $campaign->document = $request->document;
            $campaign->status = 0;
            $campaign->user_id = Auth::user()->id;
        $campaign->save();

        //Story photo
        if($request->story_image){
            for($p = 0; $p< count($request->story_image); $p++){

                $fileName = microtime().'_story_photo.'.$request->story_image[$p]->getClientOriginalExtension();
                $filePath = $request->story_image[$p]->storeAs('campaign/story_image/', $fileName, 'public');

                $file = new CampaignAttachments();
                $file->photo_name = $fileName;
                $file->video_name = NULL;
                $file->campaign_id = $campaign->id;
                $file->type = 'story_photo';
                if($request->main_story_image){
                    if($p == $request->main_story_image){
                        $file->main_story_image = $request->main_story_image;
                    }
                }

                $file->save();
            }
        }

                //Story video
        if($request->story_video){
            for($p = 0; $p< count($request->story_video); $p++){

                $fileName = microtime().'_story_video.'.$request->story_video[$p]->getClientOriginalExtension();
                $filePath = $request->story_video[$p]->storeAs('campaign/story_video/', $fileName, 'public');

                $file = new CampaignAttachments();
                $file->photo_name = NULL;
                $file->video_name = $fileName;
                $file->campaign_id = $campaign->id;
                $file->type = 'story_video';
                $file->save();
            }
        }


        //Testimonial photo
        if($request->testimonial_image){
            for($p = 0; $p< count($request->testimonial_image); $p++){

                $fileName = time().'_testimonial_photo.'.$request->testimonial_image[$p]->getClientOriginalExtension();
                $filePath = $request->testimonial_image[$p]->storeAs('campaign/testimonial_image/', $fileName, 'public');

                $file = new CampaignAttachments();
                $file->photo_name = $fileName;
                $file->video_name = NULL;
                $file->campaign_id = $campaign->id;
                $file->type = 'testimonial_image';
                $file->save();
            }
        }

                //Testimonial video
        if($request->testimonial_video){
            for($p = 0; $p< count($request->testimonial_video); $p++){

                $fileName = time().'_testimonial_video.'.$request->testimonial_video[$p]->getClientOriginalExtension();
                $filePath = $request->testimonial_video[$p]->storeAs('campaign/testimonial_video/', $fileName, 'public');

                $file = new CampaignAttachments();
                $file->photo_name = NULL;
                $file->video_name = $fileName;
                $file->campaign_id = $campaign->id;
                $file->type = 'testimonial_video';
                $file->save();
            }
        }



        //Document  photo
        if($request->document_image){
            for($p = 0; $p< count($request->document_image); $p++){

                $fileName = time().'_document_photo.'.$request->document_image[$p]->getClientOriginalExtension();
                $filePath = $request->document_image[$p]->storeAs('campaign/document_image/', $fileName, 'public');

                $file = new CampaignAttachments();
                $file->photo_name = $fileName;
                $file->video_name = NULL;
                $file->campaign_id = $campaign->id;
                $file->type = 'document_image';
                $file->save();
            }
        }

                //Document  video
        if($request->document_video){
            for($p = 0; $p< count($request->document_video); $p++){

                $fileName = time().'_document_video.'.$request->document_video[$p]->getClientOriginalExtension();
                $filePath = $request->document_video[$p]->storeAs('campaign/document_video/', $fileName, 'public');

                $file = new CampaignAttachments();
                $file->photo_name = NULL;
                $file->video_name = $fileName;
                $file->campaign_id = $campaign->id;
                $file->type = 'document_video';
                $file->save();
            }
        }
        return redirect()->route('campaign.index')->with('success','Campaign is Successfully created');
    }

    public function edit($id)
    {
        $campaign = Campaign::with('CampaignAttachments','CampaignCategories','CampaignKeywords','CampaignTags','user')
                                                        ->where('id', $id)->get()[0];

        $CampaignCategories = CampaignCategories::all();
        $CampaignKeywords = CampaignKeywords::all();
        $CampaignTags = CampaignTags::all();
        // $campaign = Campaign::find($id)->with('CampaignAttachments','CampaignCategories','CampaignKeywords','CampaignTags','user');
        // dd($campaign->CampaignAttachments);
        return view('campaign.edit', compact('campaign','CampaignCategories','CampaignKeywords','CampaignTags'));
    }

    public function update(Request $request, Campaign $campaign)
    {
            // $campaign = new Campaign();
            $campaign->campaign_categories_id = $request->campaign_categories_id;
            $campaign->campaign_tags_id = $request->campaign_tags;
            $campaign->campaign_keywords_id = $request->campaign_keywords;
            $campaign->fund_req = $request->fund_req;
            $campaign->amount = $request->amount;
            $campaign->campaing_end_time = $request->campaing_end_time;
            $campaign->campaign_date = $request->campaign_date;
            $campaign->camp_end_date = $request->camp_end_date;
            $campaign->beneficiary_details = $request->beneficiary_details;
            $campaign->story_heading = $request->story_heading;
            $campaign->story_sub_heading = $request->story_sub_heading;
            $campaign->story = $request->story;
            $campaign->testimonial_heading = $request->testimonial_heading;
            $campaign->testimonial_sub_heading = $request->testimonial_sub_heading;
            $campaign->testimonial = $request->testimonial;
            $campaign->document_heading = $request->document_heading;
            $campaign->document_sub_heading = $request->document_sub_heading;
            $campaign->document = $request->document;
            // $campaign->status = 0;
            // $campaign->user_id = Auth::user()->id;
        $campaign->update();

        //Story photo
        if($request->story_image){
          dd($request->story_image);
            // for($p = 0; $p< count($request->story_image); $p++){
            //
            //     $fileName = microtime().'_story_photo.'.$request->story_image[$p]->getClientOriginalExtension();
            //     $filePath = $request->story_image[$p]->storeAs('campaign/story_image/', $fileName, 'public');
            //
            //     $file = new CampaignAttachments();
            //     $file->photo_name = $fileName;
            //     $file->video_name = NULL;
            //     $file->campaign_id = $campaign->id;
            //     $file->type = 'story_photo';
            //     if($request->main_story_image){
            //         if($p == $request->main_story_image){
            //             $file->main_story_image = $request->main_story_image;
            //         }
            //     }
            //
            //     $file->save();
            // }
        }

        return redirect()->route('campaign.index')->with('success','Campaign is Successfully Updated');

    }

    public function show( Campaign $campaign )
    {
        // $campaign = Campaign::with('CampaignAttachments','CampaignCategories','CampaignKeywords','CampaignTags','user')
                                                        // ->where('id', $id)->get()[0];

        $CampaignCategories = CampaignCategories::all();
        $CampaignKeywords = CampaignKeywords::all();
        $CampaignTags = CampaignTags::all();
        return view('campaign.show', compact('campaign','CampaignCategories','CampaignKeywords','CampaignTags'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        //
    }

    public function necessary_for_campaign($type){
        $data['type'] = $type;
        if($type == 'Categories'){
                $data['list'] = CampaignCategories::all();
        }elseif($type == 'Tags'){
                $data['list'] =  CampaignTags::all();
        }elseif($type == 'Keywords'){
                $data['list'] = CampaignKeywords::all();
        }else{
            abort(404);
        }
        return view('campaign.necessary.index', compact('data'));
    }
    public function necessary_for_campaign_Add($type){
        return view('campaign.necessary.create', compact('type'));
    }
    public function necessary_for_campaign_Store($type, Request $request)
    {
        if($type == 'Categories'){
                $necessary = new CampaignCategories();
        }elseif($type == 'Tags'){
                $necessary = new CampaignTags();
        }elseif($type == 'Keywords'){
                $necessary = new CampaignKeywords();
        }else{
            abort(404);
        }
        $necessary->name = $request->name;
        $necessary->save();

        return redirect()->route('campaign.necessary', $type)->with('success',$type.' is added in list');

    }

    public function  necessary_for_campaign_edit($id, $type)
    {
        if($type == 'Categories'){
                $data = CampaignCategories::find($id);
        }elseif($type == 'Tags'){
                $data = CampaignTags::find($id);
        }elseif($type == 'Keywords'){
                $data =  CampaignKeywords::find($id);
        }else{
            abort(404);
        }

        return view('campaign.necessary.edit', compact('data','type'));

    }

    public function necessary_for_campaign_update($id, $type, Request $request)
    {
        if($type == 'Categories'){
                $data = CampaignCategories::find($id);
        }elseif($type == 'Tags'){
                $data = CampaignTags::find($id);
        }elseif($type == 'Keywords'){
                $data =  CampaignKeywords::find($id);
        }else{
            abort(404);
        }

        $data->name = $request->name;
        $data->update();
        return redirect()->route('campaign.necessary', $type)->with('success',$type.' is updated in list');

    }

    public function send_campaign_to_editor($id)
    {
        $camp = Campaign::find($id);
        if($camp->status == 0){
            $camp->status = 1;
            $camp->update();
            return redirect()->route('campaign.index')->with('success','Campaign is sent to Editor for Review.');
        }

        if($camp->status == 1){
            return redirect()->route('campaign.index')->with('error','Campaign is already sent to Editor for Review.');
        }
    }


    public function sendToProofReadercamp($id)
    {
        $camp = Campaign::find($id);
                    if($camp->status == 1){
                        $camp->status = 2;
                        $camp->update();
                        return redirect()->route('campaign.index')->with('success','Campaign is sent to Proof Reader.');
                    }

                    if($camp->status == 2){
                        return redirect()->route('campaign.index')->with('error','Campaign is already sent to Proof Reader.');
                    }
    }
    public function sendBackToEditocampr(Request $request)
    {

            $camp = Campaign::find($request->campaign_id);
            if($request->mode == 'translator'){
                                    $camp->translated_by = Auth::user()->id;
                                    $camp->translated_question = $request->translator_remarks;
            }else{
                                    $camp->proofread_by = Auth::user()->id;
                                    $camp->proofreaded_question = $request->proofreader_remarks;
            }
                $camp->status = 1;
                $camp->update();
                return redirect()->route('campaign.index')->with('success','Campaign is sent back to Editor.');

    }
    public function sendToTranslatorcamp($id){
                $camp = Campaign::find($id);
                    if($camp->status == 1){
                        $camp->status = 3;
                        $camp->update();
                        return redirect()->route('campaign.index')->with('success','Campaign has been sent to Translator.');
                    }
                    if($camp->status == 3){
                        return redirect()->route('campaign.index')->with('error','Campaign has already been sent to Translator.');
                    }
    }

    public function publish_camp($id){
        $camp = Campaign::find($id);
        $camp->published_by = Auth::user()->id;
        $camp->published = 1;
        $camp->published_at = now();
        $camp->update();
            return redirect()->route('campaign.index')->with('success','Campaign published Successfully');
    }

    public function unpublish_camp($id){
        $camp = Campaign::find($id);
        $camp->unpublished_by = Auth::user()->id;
        $camp->published = 0;
        $camp->update();
            return redirect()->route('campaign.index')->with('error','Campaign  Un-published Successfully');
    }
    public function campaignStorySection($id){
        $stories = CampaignStoryUpdate::where('campaign_id', $id)->get();
        return view('campaign.story_update', compact('id', 'stories'));
    }
    public function campaignStoryAdd($id){
        return view('campaign.story_add', compact('id'));
    }
    public function campaignStorySave(Request $request, $id){
        $camp = new CampaignStoryUpdate();
        $camp->story_heading = $request->story_heading;
        $camp->story_sub_heading = $request->story_sub_heading;
        $camp->story = $request->story;
        $camp->campaign_id = $id;
        $camp->user_id = Auth::user()->id;
        $camp->save();
        return redirect()->route('campaign.story.updates', $id)->with('success','Campaign Story Added Successfully created');
    }
    public function campaignStoryEdit($id){
        $update = CampaignStoryUpdate::find($id);
        // dd($update);
        return view('campaign.story_edit', compact('update'));
    }

    public function campaignStoryUpdate(Request $request, $id){
        $camp = CampaignStoryUpdate::find($id);
        $camp->story_heading = $request->story_heading;
        $camp->story_sub_heading = $request->story_sub_heading;
        $camp->story = $request->story;
        $camp->update();
        return redirect()->route('campaign.story.updates', $request->campaign_id)->with('success','Campaign Story Updated Successfully created');
    }



}
