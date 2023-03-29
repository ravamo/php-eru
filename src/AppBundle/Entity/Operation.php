<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Operation
 *
 * @ORM\Table(name="operations")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OperationRepository")
 */
class Operation
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
     * @var \Date
     *
     * @ORM\Column(name="date_event", type="date", nullable=true)
     */
    private $dateEvent;

    /**
     * @var \Date
     *
     * @ORM\Column(name="date_deployment", type="date", nullable=true)
     */
    private $dateDeployment;

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
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="operations")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity="OperationType", inversedBy="operations")
     * @ORM\JoinColumn(name="operation_type_id", referencedColumnName="id")
     */
    private $operationType;

    /**
     * @ORM\ManyToMany(targetEntity="EruType", inversedBy="operations", cascade={"persist"})
     * @ORM\JoinTable(name="operations_erutypes")
     */
    private $eruTypes;

    /**
     * @ORM\OneToMany(targetEntity="Deployment", mappedBy="operation")
     */
    private $deployments;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->eruTypes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->deployments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        $name = 'Operación';
        $country = '';
        $year = '';

        if ($this->operationType) {
            $name = $this->operationType->getName();
        }

        if ($this->country) {
            $country = $this->country->getName();
        }

        if($this->dateEvent) {
            $year = $this->dateEvent->format('Y');
        }


        return $name . ' ' . $country . ' ' . $year;
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
     * Set dateEvent
     *
     * @param \DateTime $dateEvent
     * @return Operation
     */
    public function setDateEvent($dateEvent)
    {
        $this->dateEvent = $dateEvent;

        return $this;
    }

    /**
     * Get dateEvent
     *
     * @return \DateTime 
     */
    public function getDateEvent()
    {
        return $this->dateEvent;
    }

    /**
     * Set dateDeployment
     *
     * @param \DateTime $dateDeployment
     * @return Operation
     */
    public function setDateDeployment($dateDeployment)
    {
        $this->dateDeployment = $dateDeployment;

        return $this;
    }

    /**
     * Get dateDeployment
     *
     * @return \DateTime 
     */
    public function getDateDeployment()
    {
        return $this->dateDeployment;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Operation
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
     * @return Operation
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
     * Set country
     *
     * @param \AppBundle\Entity\Country $country
     * @return Operation
     */
    public function setCountry(\AppBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \AppBundle\Entity\Country 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Add eruTypes
     *
     * @param \AppBundle\Entity\EruType $eruTypes
     * @return Operation
     */
    public function addEruType(\AppBundle\Entity\EruType $eruTypes)
    {
        $this->eruTypes[] = $eruTypes;

        return $this;
    }

    /**
     * Remove eruTypes
     *
     * @param \AppBundle\Entity\EruType $eruTypes
     */
    public function removeEruType(\AppBundle\Entity\EruType $eruTypes)
    {
        $this->eruTypes->removeElement($eruTypes);
    }

    /**
     * Get eruTypes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEruTypes()
    {
        return $this->eruTypes;
    }

    /**
     * Set operationType
     *
     * @param \AppBundle\Entity\OperationType $operationType
     * @return Operation
     */
    public function setOperationType(\AppBundle\Entity\OperationType $operationType = null)
    {
        $this->operationType = $operationType;

        return $this;
    }

    /**
     * Get operationType
     *
     * @return \AppBundle\Entity\OperationType 
     */
    public function getOperationType()
    {
        return $this->operationType;
    }

    /**
     * Add deployments
     *
     * @param \AppBundle\Entity\Deployment $deployments
     * @return Operation
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
