<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EruType
 *
 * @ORM\Table(name="eru_types")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EruTypeRepository")
 */
class EruType
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
     * @ORM\ManyToMany(targetEntity="RosterMember", mappedBy="eruTypes")
     */
    private $rosterMembers;

    /**
     * @ORM\ManyToMany(targetEntity="Operation", mappedBy="eruTypes")
     */
    private $operations;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rosterMembers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->operations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->name ? $this->name : 'Tipo de ERU';
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
     * @return EruType
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
     * @return EruType
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
     * Add operations
     *
     * @param \AppBundle\Entity\Operation $operations
     * @return EruType
     */
    public function addOperation(\AppBundle\Entity\Operation $operations)
    {
        $this->operations[] = $operations;

        return $this;
    }

    /**
     * Remove operations
     *
     * @param \AppBundle\Entity\Operation $operations
     */
    public function removeOperation(\AppBundle\Entity\Operation $operations)
    {
        $this->operations->removeElement($operations);
    }

    /**
     * Get operations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOperations()
    {
        return $this->operations;
    }
}
