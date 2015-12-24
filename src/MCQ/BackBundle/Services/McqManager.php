<?php

namespace MCQ\BackBundle\Services;

use Doctrine\ORM\EntityManager;
use MCQ\BackBundle\Entity\Mcq;

class McqManager {

    private $em;
    private $repository;

    public function __construct(EntityManager $em){
        $this->em = $em;
        $this->repository = $em->getRepository('MCQBackBundle:Mcq');

    }

    public function createMcq(Mcq $mcq){
        $this->em->persist($mcq);
        $this->em->flush();
        return true;
    }

    public function getMcqs(){
        return $this->repository->findAll();
    }

    public function getMcq($id){
        return $this->repository->find($id);
    }
}