# **淘宝开放平台 PHP SDK**

## Installation

```bash
composer require wish-cloud/laravel-sitemap
```

## Usage

```php
$client = new \WishCloud\OpenTaobao\Client(['key' => 'your-key', 'secret' => 'your-secret','debug'=>false]);
$taobao->request('API接口名称', $params);
$client->request('taobao.tbk.item.get', ['fields' => 'title,cid,pic_url,num,price', 'page_no' => 1]));

```

详细 API 文档请参考[淘宝开放平台](https://open.taobao.com/api.htm)

## License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
