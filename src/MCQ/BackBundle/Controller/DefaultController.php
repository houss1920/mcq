<?php

namespace MCQ\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MCQBackBundle:Default:index.html.twig', array('name' => $name));
    }
    public function adminAction()
    {
        return $this->render('MCQBackBundle::menu1.html.twig');
    }
}
