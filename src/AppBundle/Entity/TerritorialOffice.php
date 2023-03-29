<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TerritorialOffice
 *
 * @ORM\Table(name="territorial_offices")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TerritorialOfficeRepository")
 */
class TerritorialOffice
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
     * @ORM\OneToMany(targetEntity="RosterMember", mappedBy="territorialOffice")
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
        return $this->name ? $this->name : 'Oficina territorial';
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
     * @return TerritorialOffice
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
     * Add rosterMembers
     *
     * @param \AppBundle\Entity\RosterMember $rosterMembers
     * @return TerritorialOffice
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
}
