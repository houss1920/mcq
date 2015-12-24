<?php
/**
 * Created by PhpStorm.
 * User: HoussemEdine
 * Date: 22/08/2015
 * Time: 15:37
 */

namespace MCQ\BackBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MCQ\BackBundle\Entity\Question;

class QuestionController extends Controller
{
    public function listerAction()
    {
        $questionManager = $this->get('mcq_back.question.manager');

        $question = $questionManager->getQuestion();
        return $this->render('MCQBackBundle:Question:list.question.html.twig', array('question' => $question));

    }

    public function listAction($id)
    {
        $questionManager = $this->get('mcq_back.question.manager');

        $question = $questionManager->getQuestion($id);
        return $this->render('MCQBackBundle:Question:list.question.html.twig', array('question' => $question));

    }


    public function addAction(Request $request)
    {
        $formHandler = $this->get('mcq_back.question.handler');

        if ($request->getMethod() == 'POST') {
            if ($formHandler->process()) {
                return $this->redirect($this->generateUrl('mcq_back_mcqs'));
            }
        }
        return $this->render('MCQBackBundle:Question:new.question.html.twig', array('form' => $formHandler->getForm()->createView()));
    }

    public function updateAction(Request $request, Question $question){
        $formHandler = $this->get('mcq_back.question.handler');

        $formHandler->setQuestion($question);

        if ($request->getMethod() == 'POST') {
            if ($formHandler->process()) {
                return $this->redirect($this->generateUrl('mcq_back_mcqs'));
            }
        }
        return $this->render('MCQBackBundle:Question:edit.question.html.twig', array('form' => $formHandler->getForm()->createView()));
    }
    public function deleteAction(Question $question){

        if (!$question) {
            throw $this->createNotFoundException('No question found');
        }

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($question);
        $em->flush();

        return $this->redirect($this->generateUrl('mcq_back_mcqs'));
    }
}