<?php

namespace MCQ\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question", indexes={@ORM\Index(name="fk_question_topic1_idx", columns={"topic"})})
 * @ORM\Entity(repositoryClass="MCQ\BackBundle\Entity\QuestionRepository")
 */
class Question
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
     * @var string
     *
     * @ORM\Column(name="question_name", type="string", length=255, nullable=false)
     */
    private $question_name;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=45, nullable=false)
     */
    private $type;

    /**
     * @var \Topic
     *
     * @ORM\ManyToOne(targetEntity="Topic")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="topic", referencedColumnName="id", onDelete="SET NULL")
     * })
     */
    private $topic;



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
     * Set question_name
     *
     * @param string $nomQuestion
     *
     * @return Question
     */
    public function setQuestionname($question_name)
    {
        $this->question_name = $question_name;

        return $this;
    }

    /**
     * Get question_name
     *
     * @return string
     */
    public function getQuestionname()
    {
        return $this->question_name;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Question
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }


    /**
     * Set topic
     *
     * @param \MCQ\BackBundle\Entity\Topic $topic
     *
     * @return Question
     */
    public function setTopic(\MCQ\BackBundle\Entity\Topic $topic = null)
    {
        $this->topic = $topic;

        return $this;
    }

    /**
     * Get topic
     *
     * @return \MCQ\BackBundle\Entity\Topic
     */
    public function getTopic()
    {
        return $this->topic;
    }
}
