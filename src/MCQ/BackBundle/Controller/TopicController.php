<?php
/**
 * Created by PhpStorm.
 * User: HoussemEdine
 * Date: 22/08/2015
 * Time: 15:37
 */

namespace MCQ\BackBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use MCQ\BackBundle\Entity\Topic;

class TopicController extends Controller
{

    public function listAction($id)
    {
        $topicManager = $this->get('mcq_back.topic.manager');

        $topic = $topicManager->getTopic($id);
        return $this->render('MCQBackBundle:Topic:list.topic.html.twig', array('topic' => $topic,'idmcq' => $id));

    }

    public function addAction(Request $request,$id)
    {
        $formHandler = $this->get('mcq_back.topic.handler');
        $mcqManager = $this->get('mcq_back.mcq.manager');

        $mcq = $mcqManager->getMcq($id);
        if ($request->getMethod() == 'POST') {
            if ($formHandler->process($mcq)) {
                return new RedirectResponse($request->headers->get('referer'));
            }
        }

        return $this->render('MCQBackBundle:Topic:new.topic.html.twig', array('idmcq'=> $id,'form' => $formHandler->getForm()->createView()));
    }


    public function updateAction(Request $request, Topic $topic){
        $formHandler = $this->get('mcq_back.topic.handler');

        $formHandler->setTopic($topic);

        if ($request->getMethod() == 'POST') {
            if ($formHandler->process()) {
                return new RedirectResponse($request->headers->get('referer'));
            }
        }
        return $this->render('MCQBackBundle:Topic:edit.topic.html.twig', array('form' => $formHandler->getForm()->createView()));
    }

    public function deleteAction(Request $request, Topic $topic){

            if (!$topic) {
                throw $this->createNotFoundException('No guest found');
            }

            $em = $this->getDoctrine()->getEntityManager();
            $em->remove($topic);
            $em->flush();

        return new RedirectResponse($request->headers->get('referer'));
    }



}