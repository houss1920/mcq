<?php

namespace MCQ\BackBundle\Form\Handler;


use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use MCQ\UserBundle\Entity\User;
use MCQ\BackBundle\Services\UserManager;

class UserHandler
{

    private $form;
    private $userManager;
    private $request;

    public function __construct(Form $form, Request $request, UserManager $userManager)
    {

        $this->form = $form;
        $this->request = $request;
        $this->userManager = $userManager;

    }

    public function process()
    {
        $this->form->handleRequest($this->request);
        if ($this->form->isValid()) {
            $user = $this->form->getData();
            return $this->userManager->createUser($user);
        }
    }

    public function setUser(User $user)
    {
        $this->form->setData($user);
    }

    public function getForm()
    {
        return $this->form;
    }
}