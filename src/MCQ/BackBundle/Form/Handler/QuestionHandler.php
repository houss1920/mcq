<?php

namespace MCQ\BackBundle\Form\Handler;


use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use MCQ\BackBundle\Entity\Question;
use MCQ\BackBundle\Services\QuestionManager;

class QuestionHandler
{

    private $form;
    private $questionManager;
    private $request;

    public function __construct(Form $form, Request $request, QuestionManager $questionManager)
    {

        $this->form = $form;
        $this->request = $request;
        $this->questionManager = $questionManager;

    }

    public function process()
    {
        $this->form->handleRequest($this->request);
        if ($this->form->isValid()) {
            $question = $this->form->getData();
            return $this->questionManager->createQuestion($question);
        }
    }

    public function setQuestion(Question $question)
    {
        $this->form->setData($question);
    }

    public function getForm()
    {
        return $this->form;
    }
}