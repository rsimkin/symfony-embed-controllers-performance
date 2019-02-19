<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class WidgetController extends AbstractController
{
    public function widget(): Response
    {
        return $this->render('widget.html.twig', ['number' => rand()]);
    }
}