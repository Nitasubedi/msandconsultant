<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service;
use App\ServiceType;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    function allService($id=null)
    {
        $services = $id?Service::whereIsActive(1)->find($id)->get(['id', 'service_type_id', 'title', 'image', 'description']):
        Service::whereIsActive(1)->get(['id', 'service_type_id', 'title', 'image', 'description']);
        foreach ($services as $key => $service) {
            $service->service_type_name = ServiceType::find($service->service_type_id)->name;
            $service->image = asset($service->image) ?? '-';
        }
        return response([
            'Success' => true,
            'data' => $services,
        ]);
    }
}
