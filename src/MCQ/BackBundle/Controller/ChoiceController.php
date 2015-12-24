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
use MCQ\BackBundle\Entity\Choice;

class ChoiceController extends Controller
{
    public function listAction($id)
    {
        $choiceManager = $this->get('mcq_back.choice.manager');

        $choice = $choiceManager->getChoice($id);
        return $this->render('MCQBackBundle:Choice:list.choice.html.twig', array('choice' => $choice));

    }

    public function addAction(Request $request)
    {
        $formHandler = $this->get('mcq_back.choice.handler');

        if ($request->getMethod() == 'POST') {
            if ($formHandler->process()) {
                return $this->redirect($this->generateUrl('mcq_back_mcqs'));
            }
        }
        return $this->render('MCQBackBundle:Choice:new.choice.html.twig', array('form' => $formHandler->getForm()->createView()));
    }

    public function updateAction(Request $request, Choice $choice){
        $formHandler = $this->get('mcq_back.choice.handler');

        $formHandler->setChoice($choice);

        if ($request->getMethod() == 'POST') {
            if ($formHandler->process()) {
                return $this->redirect($this->generateUrl('mcq_back_mcqs'));
            }
        }
        return $this->render('MCQBackBundle:Choice:edit.choice.html.twig', array('form' => $formHandler->getForm()->createView()));
    }
    public function deleteAction(Choice $choice){
        $formHandler = $this->get('mcq_back.choice.handler');

        if (!$choice) {
            throw $this->createNotFoundException('No reponse found');
        }

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($choice);
        $em->flush();

        return $this->render('MCQBackBundle:Choice:delete.choice.html.twig', array('form' => $formHandler->getForm()->createView()));
    }

}