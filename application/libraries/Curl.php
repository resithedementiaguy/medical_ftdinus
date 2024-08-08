<?php
class Curl
{

    public function simple_get($url, $params = array(), $headers = array())
    {
        $ci = &get_instance();
        $ci->load->library('curl');
        $ci->curl->create($url);
        if (!empty($params)) {
            $ci->curl->post($params);
        }
        if (!empty($headers)) {
            $ci->curl->http_header($headers);
        }
        $ci->curl->option(CURLOPT_RETURNTRANSFER, true);
        $result = $ci->curl->execute();
        $ci->curl->close();
        return $result;
    }
}
