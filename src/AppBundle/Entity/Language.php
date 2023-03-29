<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Language
 *
 * @ORM\Table(name="languages")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LanguageRepository")
 */
class Language
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
     * @var string
     *
     * @ORM\Column(name="level", type="text", nullable=true)
     */
    private $level;

    /**
     * @ORM\ManyToMany(targetEntity="RosterMember", mappedBy="languages")
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
        if ($this->level) {
            return $this->name .'('.$this->level.')';
        } else if ($this->name) {
            return $this->name;
        } else {
            return 'Idioma';
        }
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
     * @return Language
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
     * Set level
     *
     * @param string $level
     * @return Language
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

    /**
     * Add rosterMembers
     *
     * @param \AppBundle\Entity\RosterMember $rosterMembers
     * @return Language
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
