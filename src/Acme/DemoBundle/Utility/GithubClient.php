<?php
/**
 * Created by PhpStorm.
 * User: will_melbourne
 * Date: 2014-04-09
 * Time: 7:02 PM
 */

namespace Acme\DemoBundle\Utility;

class GitHubClient
{
    public function retrieveUsersRepositories($userName)
    {
        // create a new cURL resource
        $ch = curl_init("https://api.github.com/users/" . $userName . "/repos");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_ENCODING, "");

        curl_setopt($ch,CURLOPT_USERAGENT, "simple Symfony APP");
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        curl_setopt($ch, CURLOPT_FAILONERROR, TRUE);
        curl_setopt($ch, CURLOPT_VERBOSE, TRUE);


        // grab URL and pass it to the browser
        $results = curl_exec($ch);

        $info = curl_getinfo($ch);

        // close cURL resource, and free up system resources
        curl_close($ch);

        return $results;
    }
}