<?php

namespace WishCloud\OpenTaobao;

use WishCloud\Foundation\AbstractAPI;

class Api extends AbstractAPI
{

    const URL = 'http://gw.api.taobao.com/router/rest';

    private $key;
    private $secret;
    private $options;

    public function __construct($key, $secret, $options = [])
    {
        $this->key    = $key;
        $this->secret = $secret;
        $this->options = $options;
    }

    private function signature($params)
    {
        ksort($params);

        $sign = $this->secret;
        foreach ($params as $k => $v) {
            if (!is_array($v) && strpos($v, '@') !== 0) {
                $sign .= "$k$v";
            }
        }

        $sign .= $this->secret;

        return strtoupper(md5($sign));
    }

    public function request($method, $params)
    {
        $http = $this->getHttp();
        if($this->options) $http->setDefaultOptions($this->options);

        $params['app_key']     = $this->key;
        $params['v']           = '2.0';
        $params['format']      = 'json';
        $params['sign_method'] = 'md5';
        $params['method']      = $method;
        $params['timestamp']   = date('Y-m-d H:i:s');
        $params['sign']        = $this->signature($params);
        $response = call_user_func_array([$http, 'post'], [self::URL, $params]);
        return json_decode((string)$response->getBody(), true);
    }
}
