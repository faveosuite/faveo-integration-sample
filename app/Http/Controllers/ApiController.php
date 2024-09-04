<?php

namespace App\Http\Controllers;

use App\Models\ApiCategories;
use App\Models\ApiInfo;
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
        $response = aplCustomPost('https://sadha.localhost/manager/public' . $endpoint, $post);
        return response()->json($response);
    }
    public function listApi()
    {
       $response = ApiInfo::get();
       return view('layout.apisList', ['apis' => $response]);
    }
}
