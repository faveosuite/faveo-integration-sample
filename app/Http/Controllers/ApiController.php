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
        $response = aplCustomPost('https://sadha.localhost/manager/public'.$endpoint, $post);
        return response()->json($response);
    }
    public function listApi($category_id)
    {
       $response = ApiInfo::get()->where('category_id', $category_id);
       return view('layout.apisList', ['apis' => $response]);
    }
    public function getApiCategories()
    {
        $apiCategories = ApiCategories::get();
        return view('layout.apiCategory', ['categories' => $apiCategories]);
    }
}
