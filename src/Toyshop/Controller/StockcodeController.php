<?php
namespace Toyshop\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Silex\Application;
use Silex\ControllerProviderInterface;
use Toyshop\Model\Toy;

/**
 * The routes used for stockcode
 *
 * @package toyshop
 */
class StockcodeController implements ControllerProviderInterface
{
    private $toys = array(
        '00001'=> array(
            'name' => 'Racing Car',
            'quantity' => '53',
            'description' => '...',
            'image' => 'racing_car.jpg',
        ),
        '00002' => array(
            'name' => 'Raspberry Pi',
            'quantity' => '13',
            'description' => '...',
            'image' => 'raspberry_pi.jpg',
        ),
    );

    /**
     * Connect function is used by Silex to mount the controller to the application
     * @param Application $app Silex Application Object.
     *
     * @return Response Silex Response Object.
     */
    public function connect(Application $app)
    {
        $factory = $app['controllers_factory'];

        /**
         * get all stockcode
         *
         * @param string $app
         *
         * @return string
         */
        $factory->get('/', function (Application $app) {
            return json_encode($this->toys);
        });

        /**
         * get a stockcode
         *
         * @param string $app
         * @param string $stockcode
         *
         * @return string
         */
        $factory->get('/{stockcode}', function (Application $app, $stockcode) {
            if (!isset($this->toys[$stockcode])) {
                $app->abort(404, "Stockcode {$stockcode} does not exist.");
            }
            return json_encode($this->toys[$stockcode]);
        });

        /**
         * Delete a stockcode
         *
         * @param string $app
         * @param string $stockcode
         *
         * @return string
         */
        $factory->delete('/{stockcode}', function (Application $app, $stockcode) {
            if (delete_toy($stockcode)) {
                $responseCode = Response::HTTP_NO_CONTENT;
            } else {
                $responseCode = Response::HTTP_INTERNAL_SERVER_ERROR;
            }

            return new Response('', $responseCode);
        });

        return $factory;
    }
}
