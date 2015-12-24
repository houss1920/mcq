<?php

namespace MCQ\BackBundle\Services;

use Doctrine\ORM\EntityManager;
use MCQ\BackBundle\Entity\Topic;

class TopicManager {
    private $em;
    private $repository;

    public function __construct(EntityManager $em){
        $this->em = $em;
        $this->repository = $em->getRepository('MCQBackBundle:Topic');

    }


    public function createTopic(Topic $Topic){
        $this->em->persist($Topic);
        $this->em->flush();
        return true;
    }

    public function getTopic($id){

        return $this->repository->findBy(array('mcq'=>$id));
    }

    public function getTopics(){

        return $this->repository->findAll();
    }
}