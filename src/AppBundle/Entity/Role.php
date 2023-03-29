<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 *
 * @ORM\Table(name="roles")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RoleRepository")
 */
class Role
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
     * Constructor
     */
    public function __construct()
    {
        $this->deployments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @ORM\OneToMany(targetEntity="Deployment", mappedBy="role")
     */
    private $deployments;

    public function __toString()
    {
        return $this->name ? $this->name : 'Rol';
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
     * @return Role
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
     * Add deployments
     *
     * @param \AppBundle\Entity\Deployment $deployments
     * @return Role
     */
    public function addDeployment(\AppBundle\Entity\Deployment $deployments)
    {
        $this->deployments[] = $deployments;

        return $this;
    }

    /**
     * Remove deployments
     *
     * @param \AppBundle\Entity\Deployment $deployments
     */
    public function removeDeployment(\AppBundle\Entity\Deployment $deployments)
    {
        $this->deployments->removeElement($deployments);
    }

    /**
     * Get deployments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDeployments()
    {
        return $this->deployments;
    }
}
