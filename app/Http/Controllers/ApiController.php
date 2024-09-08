<?php

namespace App\Http\Controllers;

use App\Models\ApiCategories;
use App\Models\ApiInfo;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getApiDetails($id)
    {
        $apiInfo = ApiInfo::where('id', $id)->first();
        return view('layout.apisDetails', [
            'name' => $apiInfo->name,
            'endpoint' => $apiInfo->endpoint,
            'description' => $apiInfo->description,
            'method' => $apiInfo->method,
            'parameters' => $apiInfo->parameters,
        ]);
    }
    public function sendRequest(Request $request)
    {
        $post = $request->input('post');
        $endpoint = $request->input('endpoint');
        $setting = Setting::where('id', 1)->first();
        $licenseManagerURL = !empty($setting) ? $setting->license_manager_url : '';
        $response = aplCustomPost(appendUrl($licenseManagerURL,$endpoint), $post, appendUrl($licenseManagerURL,$endpoint));
        return successResponse($response);
    }
    public function listApi()
    {
       $response = ApiInfo::get();
       return view('layout.apisList', ['apis' => $response]);
    }

    public function updateApiSetting(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'license_manager_url' => 'required|url',
        ]);
        // Check if validation fails
        if ($validator->fails()) {
            return errorResponse($validator->errors());
        }

        $licenseManagerUrl = $request->input('license_manager_url');
        Setting::updateOrInsert(
            ['id' => 1],
            ['license_manager_url' => $licenseManagerUrl]
        );
        return successResponse('Setting updated successfully');
    }
    public function getSettings()
    {
        return successResponse('',Setting::where('id', 1)->first());
    }
    public function hashGenerator(Request $request)
    {
        $license_code = $request->input('license_code') ? $request->input('license_code') : '';
        $product_id = $request->input('product_id') ? $request->input('product_id') : '';
        $client_email = $request->input('client_email') ? $request->input('client_email') : '';

        $setting = Setting::where('id', 1)->first();
        $ROOT_URL = !empty($setting) ? $setting->license_manager_url : '';
        $INSTALLATION_HASH = hash('sha256', $ROOT_URL . $client_email . $license_code);
        $license_signature = rawurlencode(aplGenerateScriptSignature($ROOT_URL, $client_email, $license_code, $product_id));
        $connection_hash = rawurlencode(hash('sha256', 'connection_test'));
        return successResponse('', [
            'installation_hash' => $INSTALLATION_HASH,
            'license_signature' => $license_signature,
            'root_url' => $ROOT_URL,
            'connection_hash' => $connection_hash
        ]);
    }
}
