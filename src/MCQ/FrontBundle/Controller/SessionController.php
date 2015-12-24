<?php

namespace MCQ\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SessionController extends Controller
{

    public function showAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $userId = $user->getId();

        $sessionManager = $this->get('mcq_back.session.manager');

        $session = $sessionManager->getSessionByUser($userId);

        return $this->render('MCQFrontBundle:Session:session.front.html.twig', array('session' => $session,'userId' => $userId));

    }

}