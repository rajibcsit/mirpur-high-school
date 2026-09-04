<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'school_name',
        'short_name',
        'tagline',
        'site_title',
        'site_description',
        'logo_path',
        'favicon_path',
        'email',
        'phone',
        'alternate_phone',
        'address',
        'facebook_url',
        'youtube_url',
        'linkedin_url',
        'website_url',
        'established_year',
        'principal_name',
        'footer_text',
    ];
}
