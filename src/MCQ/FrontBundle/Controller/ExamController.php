<?php

namespace MCQ\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ExamController extends Controller
{

    public function examAction($id)
    {
        $mcqManager = $this->get('mcq_back.mcq.manager');

        $mcq = $mcqManager->getMcq($id);

        $topicManager = $this->get('mcq_back.topic.manager');

        $topic = $topicManager->getTopic($id);

        $questionManager = $this->get('mcq_back.question.manager');

        $question = $questionManager->getQuestion($id);

        $choiceManager = $this->get('mcq_back.choice.manager');

        $choice = $choiceManager->getChoice($id);
        return $this->render('MCQFrontBundle:Exam:exam.html.twig', array('mcq' => $mcq,'id' => $id,'topic' => $topic,'question' => $question,'choice' => $choice));


    }
}