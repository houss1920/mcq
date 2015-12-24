<?php

namespace MCQ\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function frontAction()
    {
        return $this->render('MCQFrontBundle::menu2.html.twig');
    }
}
