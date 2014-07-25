<?php
use Silex\Application;
use Model\Toy;

$app = new Silex\Application();
$app['debug'] = true;

$toys = array(
    '00001' => new Toy(
        'Racing Car',
        '53',
        '...',
        'racing_car.jpg'
    ),
    '00002' => new Toy(
        'Raspberry Pi',
        '13',
        '...',
        'raspberry_pi.jpg'
    )
);

$app->get('/', function () use ($toys) {
    return json_encode($toys);
});

$app->get('/{stockcode}', function (Application $app, $stockcode) use ($toys) {
    if (!isset($toys[$stockcode])) {
        $app->abort(404, "Stockcode {$stockcode} does not exist.");
    }
    return json_encode($toys[$stockcode]);
});

return $app;
