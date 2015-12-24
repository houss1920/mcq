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
use MCQ\BackBundle\Entity\Mcq;
use Symfony\Component\HttpFoundation\RedirectResponse;

class McqController extends Controller
{

    public function listAction()
    {
        $mcqManager = $this->get('mcq_back.mcq.manager');

        $mcq = $mcqManager->getMcqs();
        return $this->render('MCQBackBundle:Mcq:list.mcq.html.twig', array('mcq' => $mcq));

    }

    public function showAction($id)
    {
        $mcqManager = $this->get('mcq_back.mcq.manager');

        $mcq = $mcqManager->getMcq($id);
        return $this->render('MCQBackBundle:Mcq:show.mcq.html.twig', array('mcq' => $mcq));

    }

    public function addAction(Request $request)
    {
        $formHandler = $this->get('mcq_back.mcq.handler');
        if ($request->getMethod() == 'POST') {
            if ($formHandler->process()) {
                return new RedirectResponse($request->headers->get('referer'));

            }
        }
        return $this->render('MCQBackBundle:Mcq:new.mcq.html.twig', array('form' => $formHandler->getForm()->createView()));
    }

    public function updateAction(Request $request, Mcq $mcq){
        $formHandler = $this->get('mcq_back.mcq.handler');

        $formHandler->setMcq($mcq);

        if ($request->getMethod() == 'POST') {
            if ($formHandler->process()) {
                return new RedirectResponse($request->headers->get('referer'));
            }
        }
        return $this->render('MCQBackBundle:Mcq:edit.mcq.html.twig', array('form' => $formHandler->getForm()->createView()));
    }
    public function deleteAction(Request $request,Mcq $mcq){

        if (!$mcq) {
            throw $this->createNotFoundException('No Mcq found');
        }

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($mcq);
        $em->flush();

        return new RedirectResponse($request->headers->get('referer'));
    }
}