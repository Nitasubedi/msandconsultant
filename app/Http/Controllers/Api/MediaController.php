<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Media;
use App\MediaTypes;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    function sliders()
    {
        $mediaType = MediaTypes::where('name', 'slider')->whereIsActive(1)->first();
        $medias = Media::where('media_type_id', $mediaType->id)->whereIsActive(1)->get(['id', 'title', 'image', 'description']);
        foreach ($medias as $key => $media) {
            $media->image = asset($media->image) ?? '-';
            $media->description = $media->description ?? '';
        }
        return response([
            'Success' => true,
            'data' => $medias,
        ]);
    }
    
    function logo()
    {
        $mediaType = MediaTypes::where('name', 'logo')->whereIsActive(1)->first();
        $logo = Media::where('media_type_id', $mediaType->id)->whereIsActive(1)->get(['id', 'title', 'image']);
        foreach ($logo as $key => $value) {
            $value->image = asset($value->image) ?? '-' ;
        }
        return response([
            'Success' => true,
            'data' => $logo,
        ]);
    }

    function allMedia()
    {
        // $medias = Media::with('mediaType')->get();

        $mediaTypes = MediaTypes::whereIsActive(1)->get();
        $currentDate = now();
        foreach ($mediaTypes as $key => $mediaType) {

            unset($mediaType->created_at,$mediaType->updated_at,$mediaType->is_active);

            //  $mediaType->media;  ---works same as below---   $mediaType[$key]['data'] =
            $medias = Media::where('media_type_id', $mediaType->id)->
                where(function($query) use ($currentDate) {
                $query->where('expires_on', '>', $currentDate)
                    ->orWhereNull('expires_on');})->get();

                foreach ($medias as $media) {
                    $media->image = asset($media->image) ?? '-';
                    $media->expires_on = $media->expires_on ?? '';
                    $media->description = $media->description ?? '';
                    unset($media->created_at, $media->updated_at);
                }
            $mediaType->data = $medias;
        }
        return response([
            'Success' => true,
            'data' => $mediaTypes,
        ]);
    }
}