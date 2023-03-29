<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * WorkGroup
 *
 * @ORM\Table(name="work_groups")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WorkGroupRepository")
 */
class WorkGroup
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
     * @var string
     *
     * @ORM\Column(name="name", type="text")
     */
    private $name;

    /**
     * @var \Date
     *
     * @ORM\Column(name="date_start", type="date", nullable=true)
     */
    private $startDate;

    /**
     * @var \Date
     *
     * @ORM\Column(name="date_end", type="date", nullable=true)
     */
    private $endDate;

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
     * @ORM\ManyToMany(targetEntity="RosterMember", inversedBy="workGroups")
     * @ORM\JoinTable(name="workgroups_rostermembers")
     */
    private $rosterMembers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rosterMembers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->name ? $this->name : 'Grupo de trabajo';
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
     * Set name
     *
     * @param string $name
     * @return WorkGroup
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return WorkGroup
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
     * @return WorkGroup
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
     * Add rosterMembers
     *
     * @param \AppBundle\Entity\RosterMember $rosterMembers
     * @return WorkGroup
     */
    public function addRosterMember(\AppBundle\Entity\RosterMember $rosterMembers)
    {
        $this->rosterMembers[] = $rosterMembers;

        return $this;
    }

    /**
     * Remove rosterMembers
     *
     * @param \AppBundle\Entity\RosterMember $rosterMembers
     */
    public function removeRosterMember(\AppBundle\Entity\RosterMember $rosterMembers)
    {
        $this->rosterMembers->removeElement($rosterMembers);
    }

    /**
     * Get rosterMembers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRosterMembers()
    {
        return $this->rosterMembers;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return WorkGroup
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return WorkGroup
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }
}
