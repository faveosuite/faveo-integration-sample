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
        $method = $request->input('method');
        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiNDkyY2RiMjQwZTc1NDM2MmRkMDA1NDZkYjFmNWNiMmJhYTNjNTc4NWQyYTg4MmM3ZGIwZDc2MDE4ODFlZjA4OTcyOTdjYWZlMDc4ZmJlYTkiLCJpYXQiOjE3MjQ0MTA5MzcuNDE2MzE5LCJuYmYiOjE3MjQ0MTA5MzcuNDE2MzIsImV4cCI6MTcyNDQ5NzMzNy40MDg5Nywic3ViIjoiMiIsInNjb3BlcyI6W119.ns18lXrGEqVAGqJx2F-dA2KGucNjg-LXj8rvyqz3JOQXKP2vVRj2i3iJwnP5QfjJLhZn6KT6RlRowTMhl5ExYgx-6-eqxd04IXI5CYyCI8DJ3or26z48Brqh1_GgaTyw6pYObIiTaZY5To0C9wr99tembjW96dnimu-71nlm2lnij4M4HqBcIMLefcKIRdtWc1jUgTts8VaiAwUx7IktiBtah-NxvKYaEEC9Ps_6lyx63yonpLkTLCGwxy0OI_a5-lyb6FvgCPKDsR5kvUelWBBgv_3EFm2IaCLmdcsn2K_uiq8qPl9CLb92IXMVc3M2W5_MKHkn_FWMw0arVQEandQPFZSff6qVDT4mIyrLI-j4lj2Ek8bmWx3A9oA7KcClm9k8Ib4gDqF7HCsWjmUvfszz5MmEN6jeX-nJ8_hjfqTWS5bgQvoGJNUH3QRtBU5Hx_XenrXOLhduRMy0bc1pICGFBfTXR1RmVDjjnPP5jKpFA8cme4n6vbsrW2zVIW-SWF-u9WQCKZ6wcyXU0_IHhyn7Q3rIR3HNUXaDL-zU2uv2NNcv2_hKCqWqRKexm_3KNWNFRJd7V5jdoRTe6GPc3ZDx51hdk8JAd--p7iRTHXWkZxqKFo8OsbuCCUVYEVJZLDiIqLKZvaLRR49DcOfxU-a7rY6HexaBFwlcHJm5ZHU";
        if($method == 'GET') {
            $response = getCurl('https://sadha.localhost/manager/public/api/admin' . $endpoint, $token);
        }
        else if($method == 'POST') {
            $response = aplCustomPost('https://sadha.localhost/manager/public' . $endpoint, $post);
        }
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
