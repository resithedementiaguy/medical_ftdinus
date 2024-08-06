<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('curl_get')) {
    function curl_get($url, $headers = [])
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            curl_close($ch);
            return ['error' => $error_msg];
        }

        curl_close($ch);

        return ['status_code' => $httpCode, 'response' => $response];
    }
}
