<?php

namespace MCQ\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mcq
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MCQ\BackBundle\Entity\McqRepository")
*/
class Mcq
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="mcq_name", type="string", length=255)
     */
    private $mcq_name;

    /**
     * @var string
     *
     * @ORM\Column(name="level", type="string", length=255)
     */
    private $level;

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
     * Set mcq_name
     *
     * @param string $mcq_name
     * @return Mcq
     */
    public function setMcqname($mcq_name)
    {
        $this->mcq_name = $mcq_name;

        return $this;
    }

    /**
     * Get mcq_name
     *
     * @return string
     */
    public function getMcqname()
    {
        return $this->mcq_name;
    }
    /**
     * Set level
     *
     * @param string $level
     * @return Mcq
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return string
     */
    public function getLevel()
    {
        return $this->level;
    }
}
