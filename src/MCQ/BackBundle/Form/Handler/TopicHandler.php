<?php

namespace MCQ\BackBundle\Form\Handler;


use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use MCQ\BackBundle\Entity\Topic;
use MCQ\BackBundle\Entity\Mcq;
use MCQ\BackBundle\Services\TopicManager;

class TopicHandler
{

    private $form;
    private $topicManager;
    private $request;

    public function __construct(Form $form, Request $request, TopicManager $topicManager)
    {

        $this->form = $form;
        $this->request = $request;
        $this->topicManager = $topicManager;

    }

    public function process(Mcq $mcq)
    {
        $this->form->handleRequest($this->request);
        if ($this->form->isValid()) {
            $topic = $this->form->getData();
            $topic->setMcq($mcq);
            return $this->topicManager->createTopic($topic);
        }
    }

    public function setTopic(Topic $topic)
    {
        $this->form->setData($topic);
    }

    public function getForm()
    {
        return $this->form;
    }
}