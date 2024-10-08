<?php

use App\Models\Setting;

function aplCustomPost($url, $post_info = '', $refer = '')
{
    $user_agent = 'license manager cURL';
    $connect_timeout = 10;
    $server_response_array = [];
    $formatted_headers_array = [];
    if (filter_var($url, FILTER_VALIDATE_URL) && !empty($post_info)) {
        if (empty($refer) || !filter_var($refer, FILTER_VALIDATE_URL)) {
            // Use original URL as refer when no valid refer URL provided
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

        // This function is called by curl for each header received
        curl_setopt($ch, CURLOPT_HEADERFUNCTION, function ($curl, $header) use (&$formatted_headers_array) {
            $len = strlen($header);
            $header = explode(':', $header, 2);
            if (count($header) < 2) { // Ignore invalid headers
                return $len;
            }
            $name = strtolower(trim($header[0]));
            $formatted_headers_array[$name] = trim($header[1]);

            return $len;
        });

        $result = curl_exec($ch);
        $curl_error = curl_error($ch); // Returns a human-readable error (if any)
        curl_close($ch);

        $server_response_array['headers'] = $formatted_headers_array;

        // Check if content-type is not HTML and add body
        if (!isset($formatted_headers_array['content-type']) || strpos($formatted_headers_array['content-type'], 'application/octet-stream') === false) {
            $server_response_array['body'] = $result;
        }

        $server_response_array['error'] = $curl_error;
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

function ausGenerateScriptSignature($product_id,$product_key,$root_url)
{
    $script_signature = '';
    $root_ips_array = gethostbynamel(ausGetRawDomain($root_url));

    if (! empty($root_ips_array)) { //IP(s) resolved successfully
        $script_signature = hash('sha256', gmdate('Y-m-d').$product_id.$product_key.implode('', $root_ips_array));
    }

    return $script_signature;
}
function ausGetRawDomain($url)
{
    $raw_domain = '';

    if (! empty($url)) {
        $url_array = parse_url($url);
        if (empty($url_array['scheme'])) { //in case no scheme was provided in url, it will be parsed incorrectly. add http:// and re-parse
            $url = 'http://'.$url;
            $url_array = parse_url($url);
        }

        if (! empty($url_array['host'])) {
            $raw_domain = $url_array['host'];

            $raw_domain = trim(str_ireplace('www.', '', filter_var($raw_domain, FILTER_SANITIZE_URL)));
        }
    }

    return $raw_domain;
}
