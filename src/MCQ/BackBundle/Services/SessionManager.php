<?php

namespace MCQ\BackBundle\Services;

use Doctrine\ORM\EntityManager;
use MCQ\BackBundle\Entity\Session;

class SessionManager {

    private $em;
    private $repository;

    public function __construct(EntityManager $em){
        $this->em = $em;
        $this->repository = $em->getRepository('MCQBackBundle:Session');

    }

    public function createSession(Session $session){
        $this->em->persist($session);
        $this->em->flush();
        return true;
    }

    public function getSessions(){
        return $this->repository->findAll();
    }

    public function getSession($id){
        return $this->repository->findOneBy(array('user'=>$id));
    }

    public function getSessionByUser($userId){
        return $this->repository->findByUser($userId);
    }

}