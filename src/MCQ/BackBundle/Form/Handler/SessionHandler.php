<?php

namespace MCQ\BackBundle\Form\Handler;


use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use MCQ\BackBundle\Entity\Session;
use MCQ\BackBundle\Services\SessionManager;

class SessionHandler
{

    private $form;
    private $sessionManager;
    private $request;

    public function __construct(Form $form, Request $request, SessionManager $sessionManager)
    {

        $this->form = $form;
        $this->request = $request;
        $this->sessionManager = $sessionManager;

    }

    public function process()
    {
        $this->form->handleRequest($this->request);
        if ($this->form->isValid()) {
            $session = $this->form->getData();
            return $this->sessionManager->createSession($session);
        }
    }

    public function setSession(Session $session)
    {
        $this->form->setData($session);
    }

    public function getForm()
    {
        return $this->form;
    }
}