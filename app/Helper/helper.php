<?php

use App\Company;
use App\Media;
use App\MediaTypes;
use App\SocialMedia;

function companyInfo()
{
    $company = Company::first();
    return $company;
}

function getLogo()
{
    $mediaType = MediaTypes::where('name', 'logo')->whereIsActive(1)->first();
        if ($mediaType) {
            $logo = Media::where('media_type_id', $mediaType->id)->whereIsActive(1)->first();
        } else {
            $logo = null;
        }
        
        return $logo;
}

function facebookLink()
{
    $facebook = SocialMedia::where('name', 'facebook')->first();
    return $facebook;
}