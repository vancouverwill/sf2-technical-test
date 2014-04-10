<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\DemoBundle\Utility\GitHubClient;

use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('username', 'text')
            ->add('search for github results', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $results = $form->getData();

            $username = $results["username"];

            $gitHubClient = new GitHubClient();
            $results = $gitHubClient->retrieveUsersRepositories($username);

            if ($results != FALSE) {

                $resultsArray = json_decode($results);

                $nameAndWatchersCount = array();
                $count = 0;

                foreach ($resultsArray AS $resultArray) {

                    $resultArray = (array)$resultArray;
                    $nameAndWatchersCount[$count]['name'] = $resultArray['name'];
                    $nameAndWatchersCount[$count]['watchersCount'] = $resultArray['watchers_count'];

                    $count++;
                }

                $response = new Response();
                $response->setContent(json_encode($nameAndWatchersCount));
                $response->headers->set('Content-Type', 'application/json');
                return $response;
            }
            else {
                $formMessage = "No GitHub results from " . $username;
//                return new Response("No GitHub results from " . $username);
            }
        }
        else {
            $formMessage = "";
        }

        return $this->render('AcmeDemoBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
            'message' => $formMessage
        ));
    }

    public function simpleFetchAction()
    {
        $gitHubClient = new GitHubClient();
        $results = $gitHubClient->retrieveUsersRepositories("vancouverwill");

        if ($results != FALSE) {
            $response = new Response();
            $response->setContent($results);
            $response->headers->set('Content-Type', 'application/json');
        }
        else {
            $response = new Response();
            $response->setContent("hey that github user doesn't exist");
        }
        return $response;
    }



}
