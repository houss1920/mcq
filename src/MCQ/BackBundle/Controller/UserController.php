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
use MCQ\UserBundle\Entity\User;

class UserController extends Controller
{
    public function listAction()
    {
        $userManager = $this->get('mcq_back.user.manager');
        $user = $userManager->getUsers();

            return $this->render('MCQBackBundle:User:list.user.html.twig', array('user' => $user));

    }

    public function addAction(Request $request)
    {
        $formHandler = $this->get('mcq_back.user.add.handler');

        if ($request->getMethod() == 'POST') {
            if ($formHandler->process()) {
                return $this->redirect($this->generateUrl('mcq_back_users'));
            }
        }
        return $this->render('MCQBackBundle:User:new.user.html.twig', array('form' => $formHandler->getForm()->createView()));
    }


    public function deleteAction(Request $request,User $user){

        if (!$user) {
            throw $this->createNotFoundException('No user found');
        }

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($user);
        $em->flush();

        return new RedirectResponse($request->headers->get('referer'));
    }
}