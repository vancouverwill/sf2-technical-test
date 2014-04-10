<?php
/**
 * Created by PhpStorm.
 * User: will_melbourne
 * Date: 2014-04-09
 * Time: 7:26 PM
 */

namespace Acme\DemoBundle\Tests\Utility;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Acme\DemoBundle\Utility\GitHubClient;

//class GitHubClientTest extends \PHPUnit_Framework_TestCase
class GitHubClientTest  extends WebTestCase
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

    public function testSecureSection()
    {
        $client = static::createClient();

        // goes to the secure page
        $crawler = $client->request('GET', '/');

        // redirects to the login page
        $crawler = $client->followRedirect();

        // submits the login form
        $form = $crawler->selectButton('login')->form(array('_username' => 'user', '_password' => 'userpass'));
        $client->submit($form);

        // redirect to the original page (but now authenticated)
        $crawler = $client->followRedirect();

        // check that the page is the right one
        $this->assertCount(1, $crawler->filter('h2.github-search:contains("Please put a valid GitHub username in the search box below to see a JSON formatted list of their repositories")'));
    }


    /**
     * test that the git hub serch form returns a JSON header
     */
    public function testSecureSectionGitHubSearchReturnsJsonHeader()
    {
        $client = static::createClient();

        // goes to the secure page
        $crawler = $client->request('GET', '/');

        // redirects to the login page
        $crawler = $client->followRedirect();

        // submits the login form
        $form = $crawler->selectButton('login')->form(array('_username' => 'user', '_password' => 'userpass'));
        $client->submit($form);

        // redirect to the original page (but now authenticated)
        $crawler = $client->followRedirect();

        // check that the page is the right one
        $this->assertCount(1, $crawler->filter('h2.github-search:contains("Please put a valid GitHub username in the search box below to see a JSON formatted list of their repositories")'));

        $form_search = $crawler->selectButton('Search for github results')->form(array('form[username]' => 'vancouverwill'));
        $client->submit($form_search);

        $this->assertTrue(
            $client->getResponse()->headers->contains(
                'Content-Type',
                'application/json'
            )
        );

    }
}
