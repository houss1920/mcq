<?php

namespace MCQ\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Answer
 *
 * @ORM\Table(name="answer", indexes={@ORM\Index(name="fk_answer_question1_idx", columns={"question"}), @ORM\Index(name="fk_answer_choice1_idx", columns={"choice"}), @ORM\Index(name="fk_answer_session1_idx", columns={"session"})})
 * @ORM\Entity(repositoryClass="MCQ\BackBundle\Entity\answerRepository")
 */
class Answer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Question
     *
     * @ORM\ManyToOne(targetEntity="Question")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="question", referencedColumnName="id")
     * })
     */
    private $question;

    /**
     * @var \Choice
     *
     * @ORM\ManyToOne(targetEntity="Choice")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="choice", referencedColumnName="id")
     * })
     */
    private $choice;

    /**
     * @var \Session
     *
     * @ORM\ManyToOne(targetEntity="Session")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="session", referencedColumnName="id")
     * })
     */
    private $session;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set question
     *
     * @param \MCQ\BackBundle\Entity\Question $question
     *
     * @return Answer
     */
    public function setQuestion(\MCQ\BackBundle\Entity\Question $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \MCQ\BackBundle\Entity\Question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set choice
     *
     * @param \MCQ\BackBundle\Entity\Choice $choice
     *
     * @return Answer
     */
    public function setChoice(\MCQ\BackBundle\Entity\Choice $choice = null)
    {
        $this->choice = $choice;

        return $this;
    }

    /**
     * Get choice
     *
     * @return \MCQ\BackBundle\Entity\Choice
     */
    public function getChoice()
    {
        return $this->choice;
    }

    /**
     * Set session
     *
     * @param \MCQ\BackBundle\Entity\Session $session
     *
     * @return Answer
     */
    public function setSession(\MCQ\BackBundle\Entity\Session $session = null)
    {
        $this->session = $session;

        return $this;
    }

    /**
     * Get session
     *
     * @return \MCQ\BackBundle\Entity\Session
     */
    public function getSession()
    {
        return $this->session;
    }
}
