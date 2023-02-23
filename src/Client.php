<?php

namespace WishCloud\OpenTaobao;

use Hanson\Foundation\Foundation;

class Client extends Foundation
{
    public function request($method, $params, $ssl)
    {
        $api = new Api($this->config['key'], $this->config['secret']);

        return $api->request($method, $params, $ssl);
    }
}
