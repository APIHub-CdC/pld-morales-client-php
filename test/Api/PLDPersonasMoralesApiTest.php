<?php

namespace PldPmClientePhp\Client;

use \PldPmClientePhp\Client\Configuration;
use \PldPmClientePhp\Client\ApiException;
use \PldPmClientePhp\Client\ObjectSerializer;

class PLDPersonasMoralesApiTest extends \PHPUnit_Framework_TestCase
{
    

    public function setUp()
    {
        $password = getenv('KEY_PASSWORD');
        $this->signer = new \PldPmClientePhp\Client\Interceptor\KeyHandler(null, null, $password);     

        $events = new \PldPmClientePhp\Client\Interceptor\MiddlewareEvents($this->signer);
        $handler = \GuzzleHttp\HandlerStack::create();
        $handler->push($events->add_signature_header('x-signature'));
        $handler->push($events->verify_signature_header('x-signature'));

        $client = new \GuzzleHttp\Client(['handler' => $handler, 'verify' => false]);
        $config = new \PldPmClientePhp\Client\Configuration();
        $config->setHost('the_url');
        
        $this->apiInstance = new \PldPmClientePhp\Client\Api\PLDPersonasMoralesApi($client,$config);
    }
    
    
    public function testGetPLDPm()
    {
        $x_api_key = "your_api_key";
        $username = "your_username";
        $password = "your_password";

        $request = new \PldPmClientePhp\Client\Model\Peticion();
        
        $request->setRazonSocial("EMPRESA SA DE CV");

        try {
            $result = $this->apiInstance->getPLDPm($x_api_key, $username, $password, $request);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling ApiTest->getPLDPm: ', $e->getMessage(), PHP_EOL;
        }
    }
}
