<?php
/**
 * Created by PhpStorm.
 * User: HoussemEdine
 * Date: 22/08/2015
 * Time: 15:37
 */

namespace MCQ\BackBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MCQ\BackBundle\Entity\Session;


class SessionController extends Controller
{

    public function listAction()
    {

        $sessionManager = $this->get('mcq_back.session.manager');

        $session = $sessionManager->getSessions();

        return $this->render('MCQBackBundle:Session:list.session.html.twig', array('session' => $session));

    }

    public function showAction($id)
    {

        $sessionManager = $this->get('mcq_back.session.manager');

        $session = $sessionManager->getSession($id);
        return $this->render('MCQBackBundle:Session:show.session.html.twig', array('session' => $session,'id' => $id));

    }

    public function addAction(Request $request)
    {
        $formHandler = $this->get('mcq_back.session.handler');


        if ($request->getMethod() == 'POST') {
            if ($formHandler->process()) {
                return new RedirectResponse($request->headers->get('referer'));
            }
        }
        return $this->render('MCQBackBundle:Session:new.session.html.twig', array('form' => $formHandler->getForm()->createView()));

    }

    public function generateAction(Request $request,$id)
    {
        $formHandler = $this->get('mcq_back.session.generate.handler');
        $userManager = $this->get('mcq_back.user.manager');

        $user = $userManager->getUser($id);
        var_dump($user);
        if ($request->getMethod() == 'POST') {
            if ($formHandler->process($user)) {
                return new RedirectResponse($request->headers->get('referer'));
            }
        }
        return $this->render('MCQBackBundle:Session:generate.session.html.twig', array('id' => $id,'form' => $formHandler->getForm()->createView()));

    }

    public function updateAction(Request $request, Session $session,$id){
        $formHandler = $this->get('mcq_back.session.handler');

        $formHandler->setSession($session);

        if ($request->getMethod() == 'POST') {
            if ($formHandler->process()) {
                return new RedirectResponse($request->headers->get('referer'));
            }
        }
        return $this->render('MCQBackBundle:Session:edit.session.html.twig', array('id'=> $id,'form' => $formHandler->getForm()->createView()));

    }

    public function deleteAction(Request $request,Session $session){


        if (!$session) {
            throw $this->createNotFoundException('No session found');
        }

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($session);
        $em->flush();

        return new RedirectResponse($request->headers->get('referer'));
    }
}