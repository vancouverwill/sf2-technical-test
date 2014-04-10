<?php
/**
 * Created by PhpStorm.
 * User: will_melbourne
 * Date: 2014-04-09
 * Time: 7:26 PM
 */

namespace Acme\DemoBundle\Tests\Utility;


use Acme\DemoBundle\Utility\GitHubClient;

class GitHubClientTest extends \PHPUnit_Framework_TestCase
{

    public function testRetrieveUsersRepositories()
    {
        $gitHubClient = new GitHubClient();
        $results = $gitHubClient->retrieveUsersRepositories("vancouverwill");

        $this->assertTrue($results != FALSE);

    }

    public function testFailRetrieveUsersRepositories()
    {
        $gitHubClient = new GitHubClient();
        $results = $gitHubClient->retrieveUsersRepositories("vancouverXXX");

        $this->assertTrue($results == FALSE);

    }
}
