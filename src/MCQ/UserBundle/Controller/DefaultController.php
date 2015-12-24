<?php

namespace MCQ\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MCQUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
