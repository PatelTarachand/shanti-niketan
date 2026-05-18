<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'college_name_en',
        'college_name_hi',
        'email',
        'phone_1',
        'phone_2',
        'address',
        'logo',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'linkedin_url',
        'youtube_url',
    ];
}
