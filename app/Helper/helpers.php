<?php

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
