<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Deployment
 *
 * @ORM\Table(name="deployments")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DeploymentRepository")
 */
class Deployment
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var bool
     *
     * @ORM\Column(name="first_mission", type="boolean", nullable=true)
     */
    private $firstMission;

    /**
     * @var \DateTime
     * @ORM\Column(name="created_at", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @var \DateTime
     * @ORM\Column(name="updated_at", type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="RosterMember", inversedBy="deployments")
     * @ORM\JoinColumn(name="roster_member_id", referencedColumnName="id")
     */
    private $rosterMember;

    /**
     * @ORM\ManyToOne(targetEntity="Operation", inversedBy="deployments")
     * @ORM\JoinColumn(name="operation_id", referencedColumnName="id")
     */
    private $operation;

    /**
     * @ORM\ManyToOne(targetEntity="Role", inversedBy="deployments")
     * @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     */
    private $role;

    public function __toString()
    {
        return 'Despliegue';
    }
    
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Deployment
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Deployment
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set firstMission
     *
     * @param boolean $firstMission
     * @return Deployment
     */
    public function setFirstMission($firstMission)
    {
        $this->firstMission = $firstMission;

        return $this;
    }

    /**
     * Get firstMission
     *
     * @return boolean 
     */
    public function getFirstMission()
    {
        return $this->firstMission;
    }

    /**
     * Set rosterMember
     *
     * @param \AppBundle\Entity\RosterMember $rosterMember
     * @return Deployment
     */
    public function setRosterMember(\AppBundle\Entity\RosterMember $rosterMember = null)
    {
        $this->rosterMember = $rosterMember;

        return $this;
    }

    /**
     * Get rosterMember
     *
     * @return \AppBundle\Entity\RosterMember 
     */
    public function getRosterMember()
    {
        return $this->rosterMember;
    }

    /**
     * Set operation
     *
     * @param \AppBundle\Entity\Operation $operation
     * @return Deployment
     */
    public function setOperation(\AppBundle\Entity\Operation $operation = null)
    {
        $this->operation = $operation;

        return $this;
    }

    /**
     * Get operation
     *
     * @return \AppBundle\Entity\Operation 
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * Set role
     *
     * @param \AppBundle\Entity\Role $role
     * @return Deployment
     */
    public function setRole(\AppBundle\Entity\Role $role = null)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return \AppBundle\Entity\Role 
     */
    public function getRole()
    {
        return $this->role;
    }
}
