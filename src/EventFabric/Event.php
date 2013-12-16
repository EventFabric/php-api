<?php
/**
 * EventFabric (Event.php) - EventFabric API to send events
 *
 * @author Javier Dall' Amore <javier@event-fabric.com>
 * @copyright (c) EventFabric
 * @link https://github.com/EventFabric/php-api
 * @license MIT
 */
namespace EventFabric;

class Event {
    protected $value;
    protected $channel;

    public function __construct ($value, $channel) {
        $this->value= $value;
        $this->channel= $channel;
    }

    public function getEvent()
    {
        return array(
            'channel'=> $this->channel,
            'value'=> $this->value
        );
    }
}

?>
