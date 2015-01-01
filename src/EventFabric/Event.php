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
    protected $bucket;

    public function __construct ($value, $channel, $bucket = null) {
        $this->value= $value;
        $this->channel= $channel;
        $this->bucket= $bucket;
    }

    public function getEvent()
    {
        return array(
            'channel'=> $this->channel,
            'value'=> $this->value,
            'bucket'=> $this->bucket
        );
    }

    public function getValue()
    {
        return $this->value;
    }
    public function getChannel()
    {
        return $this->channel;
    }
    public function getBucket()
    {
        return $this->bucket;
    }

}

?>
