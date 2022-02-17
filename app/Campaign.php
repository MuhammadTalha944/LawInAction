<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $table = 'campaigns';
    protected $fillable = ['*'];

    public function CampaignAttachments(){
        return $this->hasMany(CampaignAttachments::class);
    }

    public function CampaignCategories(){
        return $this->belongsTo(CampaignCategories::class);
    }

    public function CampaignKeywords(){
        return $this->belongsTo(CampaignKeywords::class);
    }

    public function CampaignTags(){
        return $this->belongsTo(CampaignTags::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function donation_comments(){
        return $this->hasMany(DonationComments::class);
    }

    public function donation(){
        return $this->hasMany(Donation::class);
    }

    public function storyUpdates(){
        return $this->hasMany(CampaignStoryUpdate::class);
    }

    
    
}
