<?php

namespace IQ2i\PrestaShopWebServiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('IQ2iPrestaShopWebServiceBundle:Default:index.html.twig', array('name' => $name));
    }
}
