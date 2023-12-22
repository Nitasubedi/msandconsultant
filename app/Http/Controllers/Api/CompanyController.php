<?php

namespace App\Http\Controllers\Api;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    function companyInfo()
    {
        $companyInfo = Company::get(['id','name', 'pan_vat_no', 'email', 'address', 'phone_no','mobile_no','image','description']);
        foreach ($companyInfo as $key => $company) {
            $company->image = asset($company->image) ?? '-';
        }
        return response([
            'Success' => true,
            'data' => $companyInfo
        ]);
    }
}
