<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';


$client = new \GuzzleHttp\Client();
$res = $client->request('GET', 'https://openexchangerates.org/api/latest.json?app_id=YOUR_API_KEY');
//echo $res->getStatusCode();
// 200
//echo $res->getHeaderLine('content-type');
// 'application/json; charset=utf8'

$currencies = json_decode($res->getBody() ,true);
// '{"id": 1420053, "name": "guzzle", ...}'

$tryCurrency = $currencies['rates']['TRY'];

$config = [
    'settings' => [
        'displayErrorDetails' => true,
        'debug' => true,
    ],
];

$app = new \Slim\App($config);
$app->get('/', function (Request $request, Response $response, array $args) use ($tryCurrency) {

    //$response->getBody()->write("Hello, $TryCurrency");

    return $response->withJson(['try-currency'=> $tryCurrency]);
});
$app->run();

?>

CRUD

Create / yarat
Read/ oku
Update / güncelle
Delete /sil

/dolarkacoldu.com/api/articles / bütün makaleleri gösterir
/dolarkacoldu.com/api/articles/1 1 id'ye sahip olan makaleye gider

REST

GET - Bilgiyi çeker /dolarkacoldu.com/api/articles/1 
POST - Yeni bilgi ekler /dolarkacoldu.com/api/articles yeni makale eklemek istediğimi anlar, sunucu
PUT / bilgiyi düzenler /dolarkacoldu.com/api/articles/1 
PATCH /dolarkacoldu.com/api/articles/1 
DELETE / bilgiyi siler /dolarkacoldu.com/api/articles/1 

POST /dolarkacoldu.com/api/articles/1/comments/5?message=yeni%20yorum&timestamp=243786839

Auth0 Firebase Octa, Google Auth, facebook Auth, (OAuth2)



PATCH /dolarkacoldu.com/api/users/13434/article/5


