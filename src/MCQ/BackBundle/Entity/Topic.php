<?php

namespace MCQ\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Topic
 *
 * @ORM\Table(name="topic", indexes={@ORM\Index(name="fk_topic_mcq1_idx", columns={"mcq"})})
 * @ORM\Entity
 */
class Topic
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
     * @ORM\Column(name="topic_name", type="string", length=45, nullable=false)
     */
    private $topic_name;

    /**
     * @var \Mcq
     *
     * @ORM\ManyToOne(targetEntity="Mcq")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Mcq", referencedColumnName="id", onDelete="SET NULL")
     * })
     */
    private $mcq;



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
     * Set Topic_name
     *
     * @param string $topic_name
     *
     * @return Topic
     */
    public function setTopicname($Topic_name)
    {
        $this->topic_name = $Topic_name;

        return $this;
    }

    /**
     * Get Topic_name
     *
     * @return string
     */
    public function getTopicname()
    {
        return $this->topic_name;
    }

    /**
     * Set mcq
     *
     * @param \MCQ\BackBundle\Entity\Mcq $mcq
     *
     * @return Topic
     */
    public function setMcq(\MCQ\BackBundle\Entity\Mcq $mcq = null)
    {
        $this->mcq = $mcq;

        return $this;
    }

    /**
     * Get mcq
     *
     * @return \MCQ\BackBundle\Entity\Mcq
     */
    public function getMcq()
    {
        return $this->mcq;
    }
}