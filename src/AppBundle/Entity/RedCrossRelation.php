<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RedCrossRelation
 *
 * @ORM\Table(name="red_cross_relations")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RedCrossRelationRepository")
 */
class RedCrossRelation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="text")
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="RosterMember", mappedBy="redCrossRelation")
     */
    private $rosterMember;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rosterMember = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->name ? $this->name : 'Relación';
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
     * @return RedCrossRelation
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
     * Add rosterMember
     *
     * @param \AppBundle\Entity\RosterMember $rosterMember
     * @return RedCrossRelation
     */
    public function addRosterMember(\AppBundle\Entity\RosterMember $rosterMember)
    {
        $this->rosterMember[] = $rosterMember;

        return $this;
    }

    /**
     * Remove rosterMember
     *
     * @param \AppBundle\Entity\RosterMember $rosterMember
     */
    public function removeRosterMember(\AppBundle\Entity\RosterMember $rosterMember)
    {
        $this->rosterMember->removeElement($rosterMember);
    }

    /**
     * Get rosterMember
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRosterMember()
    {
        return $this->rosterMember;
    }
}
