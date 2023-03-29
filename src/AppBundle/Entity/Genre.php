<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Genre
 *
 * @ORM\Table(name="genres")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GenreRepository")
 */
class Genre
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
     * @ORM\OneToMany(targetEntity="RosterMember", mappedBy="genre")
     */
    private $rosterMember;


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
     * Constructor
     */
    public function __construct()
    {
        $this->rosterMember = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->name ? $this->name : 'Género';
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Genre
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
     * @return Genre
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
