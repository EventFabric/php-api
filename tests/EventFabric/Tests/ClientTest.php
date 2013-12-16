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
        $this->ef_client = new Client("your_username", "your_password");
    }

    public function testLogin()
    {
        $loginResult = $this->ef_client->login();
        $eventResult = $this->ef_client->send_event(new Event(
            array(
            'text' => 'CPU',
            'percentage' => 80
        ), "your_channel"));

        $this->assertTrue($eventResult['ok']);
    }
}
?>
