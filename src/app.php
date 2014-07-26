<?php
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Toyshop\Model\Toy;
use Toyshop\Controller\StockcodeController;

$app = new Application();
$app['debug'] = true;

$app->mount('/', new StockcodeController());

$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }
    return new Response($code. ": ". $e->getMessage());
});

return $app;
