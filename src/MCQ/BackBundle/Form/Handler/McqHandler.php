<?php

namespace MCQ\BackBundle\Form\Handler;


use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use MCQ\BackBundle\Entity\Mcq;
use MCQ\BackBundle\Services\McqManager;

class McqHandler
{

    private $form;
    private $mcqManager;
    private $request;

    public function __construct(Form $form, Request $request, McqManager $mcqManager)
    {

        $this->form = $form;
        $this->request = $request;
        $this->mcqManager = $mcqManager;

    }

    public function process()
    {
        $this->form->handleRequest($this->request);
        if ($this->form->isValid()) {
            $mcq = $this->form->getData();
            return $this->mcqManager->createMcq($mcq);
        }
    }

    public function setMcq(Mcq $mcq)
    {
        $this->form->setData($mcq);
    }

    public function getForm()
    {
        return $this->form;
    }
}