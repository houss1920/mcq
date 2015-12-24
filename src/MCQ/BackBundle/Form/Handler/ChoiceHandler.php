<?php

namespace MCQ\BackBundle\Form\Handler;


use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use MCQ\BackBundle\Entity\Choice;
use MCQ\BackBundle\Services\ChoiceManager;

class ChoiceHandler
{

    private $form;
    private $choiceManager;
    private $request;

    public function __construct(Form $form, Request $request, ChoiceManager $choiceManager)
    {

        $this->form = $form;
        $this->request = $request;
        $this->choiceManager = $choiceManager;

    }

    public function process()
    {
        $this->form->handleRequest($this->request);
        if ($this->form->isValid()) {
            $choice = $this->form->getData();
            return $this->choiceManager->createChoice($choice);
        }
    }

    public function setChoice(Choice $choice)
    {
        $this->form->setData($choice);
    }

    public function getForm()
    {
        return $this->form;
    }
}