<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    public function index(Request $request): Response
    {
    	$startTime = microtime(true);
    	$mode = $request->get('mode') ?? 'include';
    	$response = $this->render(
    	    sprintf('by_%s.html.twig', $mode),
            ['mode' => $mode]
        );
    	file_put_contents(
    		$_SERVER['DOCUMENT_ROOT'] . '/time.txt',
    		sprintf('%s %f', $request->get('mode'), microtime(true) - $startTime) . PHP_EOL,
    		FILE_APPEND 
    	);

    	return $response;
    }
}