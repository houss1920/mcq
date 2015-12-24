<?php

namespace MCQ\BackBundle\Services;

use Doctrine\ORM\EntityManager;
use MCQ\BackBundle\Entity\Question;

class QuestionManager {
    public $variable;
    private $em;
    private $repository;

    public function __construct(EntityManager $em){
        $this->em = $em;
        $this->repository = $em->getRepository('MCQBackBundle:Question');

    }


    public function createQuestion(Question $question){
        $this->em->persist($question);
        $this->em->flush();
        return true;
    }
    public function getQuestions(){
        return $this->repository->findAll();
    }
    public function getQuestion($id){
        return $this->repository->findBy(array('topic'=>$id));
    }
}