<?php

use App\Models\Setting;

function aplCustomPost($url, $post_info = '', $refer = '')
{
    $user_agent = 'license manager cURL';
    $connect_timeout = 10;
    $server_response_array = [];
    $formatted_headers_array = [];
    if (filter_var($url, FILTER_VALIDATE_URL) && ! empty($post_info)) {
        if (empty($refer) || ! filter_var($refer, FILTER_VALIDATE_URL)) { //use original URL as refer when no valid refer URL provided
            $refer = $url;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $connect_timeout);
        curl_setopt($ch, CURLOPT_TIMEOUT, $connect_timeout);
        curl_setopt($ch, CURLOPT_REFERER, $refer);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_info);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);

        //this function is called by curl for each header received - https://stackoverflow.com/questions/9183178/can-php-curl-retrieve-response-headers-and-body-in-a-single-request
        curl_setopt($ch, CURLOPT_HEADERFUNCTION,
            function ($curl, $header) use (&$formatted_headers_array) {
                $len = strlen($header);
                $header = explode(':', $header, 2);
                if (count($header) < 2) { //ignore invalid headers
                    return $len;
                }

                $name = strtolower(trim($header[0]));
                $formatted_headers_array[$name] = trim($header[1]);

                return $len;
            }
        );

        $result = curl_exec($ch);
        $curl_error = curl_error($ch); //returns a human readable error (if any)
        curl_close($ch);

        $server_response_array['headers'] = $formatted_headers_array;
        $server_response_array['error'] = $curl_error;
        $server_response_array['body'] = $result;
    }

    return $server_response_array;
}
function getCurl($get_url, $token = null)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $get_url);

    if ($token) {
        $headers = [
            'Authorization: Bearer ' . $token,
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }

    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 90);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $content = curl_exec($ch);

    if ($content === false) {
        echo 'Curl error: ' . curl_error($ch);
    }

    curl_close($ch);

    return json_decode($content, true);
}
function successResponse($message = '', $data = '', $statusCode = 200)
{
    $response = ['success' => true];
    // if message given
    if (! empty($message)) {
        $response['message'] = $message;
    }
    $response['data'] = $data;
    return response()->json($response, $statusCode);
}

function errorResponse($message, $statusCode = 400)
{
    $statusCode = ($statusCode) ?: 400;

    return response()->json(['success' => false, 'message' => $message], $statusCode);
}

function aplGenerateScriptSignature($ROOT_URL, $CLIENT_EMAIL, $LICENSE_CODE, $APL_PRODUCT_ID)
{
    $setting = Setting::where('id', 1)->first();
    $licenseManagerURL = !empty($setting) ? $setting->license_manager_url : '';
    $script_signature = '';
    $root_ips_array = gethostbynamel(aplGetRawDomain($licenseManagerURL));
    if (! empty($ROOT_URL) && isset($CLIENT_EMAIL) && isset($LICENSE_CODE) && ! empty($root_ips_array)) {
        $script_signature = hash('sha256', gmdate('Y-m-d').$ROOT_URL.$CLIENT_EMAIL.$LICENSE_CODE.$APL_PRODUCT_ID.implode('', $root_ips_array));
    }
    return $script_signature;
}
function aplGetRawDomain($url)
{
    $raw_domain = '';

    if (! empty($url)) {
        $scheme = parse_url($url, PHP_URL_SCHEME); //check if scheme exists because URL can't be parsed properly without a scheme
        if (empty($scheme)) { //add a temporary http:// scheme before parsing if needed
            $url = 'http://'.$url;
        }

        $raw_domain = str_ireplace('www.', '', parse_url($url, PHP_URL_HOST));
    }

    return $raw_domain;
}
function appendUrl($baseUrl, $endpoint) {
    // Ensure there's only one slash between the base URL and the endpoint
    return rtrim($baseUrl, '/') . '/' . ltrim($endpoint, '/');
}
