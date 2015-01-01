<?php
namespace EventFabric\Tests;
use \PHPUnit_Framework_TestCase;
use \EventFabric\Client;
use \EventFabric\Event;

class ClientTest extends PHPUnit_Framework_TestCase
{
    protected $ef_client;

    protected function setUp()
    {
        $this->ef_client = new Client("admin", "secret", "http://localhost:8080/");
    }

    public function testLogin()
    {
        $loginResult = $this->ef_client->login();
        $eventResult = $this->ef_client->send_event(new Event(
            array(
            'text' => 'CPU',
            'percentage' => 80
        ), "your_channel"));

        print($eventResult['ok']);
        $this->assertTrue($eventResult['ok']);
    }
}
?>
