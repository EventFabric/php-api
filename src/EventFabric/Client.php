<?php
/**
 * EventFabric (Client.php) - EventFabric API to send events
 *
 * @author Javier Dall' Amore <javier@event-fabric.com>
 * @copyright (c) EventFabric
 * @link https://github.com/EventFabric/php-api
 * @license MIT
 */
namespace EventFabric;

class Client
{
    protected $url;
    protected $username;
    protected $password;
    protected $ckfile;

    public function __construct ($username, $password, $root_url = "https://event-fabric.com/api/", $use_ssl = false)
    {
        $this->username = $username;
        $this->password = $password;
        $this->url = $root_url;
        $this->ckfile = tempnam("/tmp", "efcookie");
    }

    public function execute($path, $body) {
        //set POST variables
        $post_data = json_encode($body);
        $endpoint = $this->endpoint($path);

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        if ($path == 'session') {
            curl_setopt ($ch, CURLOPT_COOKIEJAR, $this->ckfile);
        }
        curl_setopt ($ch, CURLOPT_COOKIEFILE, $this->ckfile);
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array (
            'Accept: application/json',
            'Content-type: application/json'
        ));

        //execute post
        $result = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        //close connection
        curl_close($ch);
        return array(
            'ok' => $http_code == 201,
            'response' => $result
        );
    }

    //get credentials information
    public function credentials()
    {
        return array(
            'username' => $this->username,
            'password' => $this->password
        );
    }

    // return the service endpoint for path
    public function endpoint($path)
    {
        return $this->url . $path;
    }

    //login to the service with the specified credentials, return a tuple
    //with a boolean specifying if the login was successful and the response
    //object
    public function login () {
        return $this->execute("session", $this->credentials());
    }

    // send event to server, return the response object
    public function send_event($event)
    {
        return $this->execute("event", $event->getEvent());
    }
}

?>
