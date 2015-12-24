<?php

namespace MCQ\BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Session
 *
 * @ORM\Entity(repositoryClass="MCQ\BackBundle\Entity\SessionRepository")
 * @ORM\Table(name="session", indexes={@ORM\Index(name="fk_session_mcq1_idx", columns={"mcq"}), @ORM\Index(name="fk_session_user1_idx", columns={"user"})})
 */
class Session
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
     * @ORM\Column(name="expiration", type="string", nullable=true)
     */
    private $expiration ='false';

    /**
     * @var float
     *
     * @ORM\Column(name="result", type="float", precision=10, scale=0, nullable=true)
     */
    private $result ;

    /**
     * @var \Mcq
     *
     * @ORM\ManyToOne(targetEntity="Mcq")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mcq", referencedColumnName="id", onDelete="SET NULL")
     * })
     */
    private $mcq;

    /**
     * @var \User
     *
     * @ORM\OneToOne(targetEntity="\MCQ\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id", onDelete="SET NULL")
     * })
     */
    private $user;



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
     * Set expiration
     *
     * @param boolean $expiration
     *
     * @return Session
     */
    public function setExpiration($expiration)
    {
        $this->expirartion = $expiration;

        return $this;
    }

    /**
     * Get expiration
     *
     * @return boolean
     */
    public function getExpiration()
    {
        return $this->expiration;
    }

    /**
     * Set result
     *
     * @param float $result
     *
     * @return Session
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * Get result
     *
     * @return float
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Set mcq
     *
     * @param \MCQ\BackBundle\Entity\Mcq $mcq
     *
     * @return Session
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

    /**
     * Set user
     *
     * @param \MCQ\UserBundle\Entity\User $user
     *
     * @return Session
     */
    public function setUser(\MCQ\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \MCQ\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

}
