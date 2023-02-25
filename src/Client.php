<?php

namespace WishCloud\OpenTaobao;

use WishCloud\Foundation\Foundation;

class Client extends Foundation
{
    public function request($method, $params)
    {
        $api = new Api($this->config['key'], $this->config['secret'], $this->config['options'] ?? []);

        return $api->request($method, $params);
    }
}
