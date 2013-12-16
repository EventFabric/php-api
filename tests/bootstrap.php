<?php
/**
 * EventFabric (php-api) - EventFabric API to send events
 *
 * @author Javier Dall' Amore <javier@event-fabric.com>
 * @copyright (c) EventFabric
 * @link https://github.com/EventFabric/php-api
 * @license MIT
 */
// Set some configuration values
ini_set('session.use_cookies', 0);      // Don't send headers when testing sessions
ini_set('session.cache_limiter', '');   // Don't send cache headers when testing sessions

// Load our autoloader, and add our Test class namespace
$autoloader = require(__DIR__ . '/../vendor/autoload.php');
$autoloader->add('EventFabric\Tests', __DIR__);
