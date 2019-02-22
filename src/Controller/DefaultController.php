<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    public function index(Request $request): Response
    {
    	$stratTime = microtime(true);
    	$response = $this->render('base.html.twig', ['mode' => $request->get('mode')]);
    	file_put_contents(
    		'/root/symfony-embed-controllers-performance/timing.txt',
    		sprintf('%s %f', $request->get('mode'), microtime(true) - $stratTime) . PHP_EOL,
    		FILE_APPEND 
    	);

    	return $response;
    }
}