<?php

namespace MCQ\BackBundle\Services;

use Doctrine\ORM\EntityManager;
use MCQ\UserBundle\Entity\User;

class UserManager {

    private $em;
    private $repository;

    public function __construct(EntityManager $em){
        $this->em = $em;
        $this->repository = $em->getRepository('MCQBackBundle:User');

    }

    public function createUser(User $user){
        $this->em->persist($user);
        $this->em->flush();
        return true;
    }

    public function getUsers(){
        return $this->repository->findAll();
    }

    public function getUser($id){
        return $this->repository->find($id);
    }
}