# Product Feeder System

JSON'da tanımlı ürünleri istek oluşturarak, url ve header parametreleriyle google ve facebook için çıktı sağlayan bir servistir.

## Kurulum

Projede [composer](https://getcomposer.org/) kullanılmıştır.

```bash
composer dump-autoload
cd public && php -S localhost:8000
```

## Kullanımı

```html
/feed/{provider}
```


```php
curl --request GET \
  --url http://localhost:8000/feed/google \
  --header 'Accept: application/xml'
```

```php
curl --request GET \
  --url http://localhost:8000/feed/facebook \
  --header 'Accept: application/json'
```

## Kernel
Kernel özelliği, istek tiplerine göre url parametrelerini anlamlı ve dinamik kullanıma sunmaktadır.

Örneğin :
```php
$app->get('/', [HomeController::class, 'index']);
$app->get('/feed/{provider}', [ProductFeederController::class, 'index']);
$app->post('/feed/{test}/{test2}',[TestController::class, 'index']);
```

## Request
Gelen isteklerin parametrelere dönüştürüldüğü bir özelliktir.

## InteractsResponse
İsteklerin dinamik bir şekilde çıktı almasını sağlayan bir özelliktir.

## ProductFeederFactory
Çeşitli parametreleri kullanarak obje üretimi sağlayan bir özelliktir.
```php
ProductFeederFactory::make('google', 'xml');
ProductFeederFactory::make('facebook', 'json');
```

---
**Not:** Bu proje php@8.1 ile SonarLint standartlarına uygun hazırlanmıştır.

---
Teşekkürler
# product-feeder-system
