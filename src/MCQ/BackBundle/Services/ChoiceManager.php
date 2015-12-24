<?php

namespace MCQ\BackBundle\Services;

use Doctrine\ORM\EntityManager;
use MCQ\BackBundle\Entity\Choice;

class ChoiceManager {

    private $em;
    private $repository;

    public function __construct(EntityManager $em){
        $this->em = $em;
        $this->repository = $em->getRepository('MCQBackBundle:Choice');

    }

    public function createChoice(Choice $choice){
        $this->em->persist($choice);
        $this->em->flush();
        return true;
    }

    public function getChoice($id){
        return $this->repository->findBy(array('question'=>$id));
    }
    public function getChoices(){
        return $this->repository->findAll();
    }
}