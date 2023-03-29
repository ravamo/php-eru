<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * RosterMember
 *
 * @ORM\Table(name="roster_members")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RosterMemberRepository")
 */
class RosterMember
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
     * @ORM\Column(name="name", type="text", nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="text", nullable=true)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile_phone", type="text", nullable=true)
     */
    private $mobilePhone;

    /**
     * @var string
     *
     * @ORM\Column(name="extra_phone", type="text", nullable=true)
     */
    private $extraPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="text", nullable=true)
     */
    private $email;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active;

    /**
     * @var bool
     *
     * @ORM\Column(name="responsible_statement", type="boolean", nullable=true)
     */
    private $responsibleStatement;

    /**
     * @ORM\ManyToOne(targetEntity="Genre", inversedBy="rosterMember")
     * @ORM\JoinColumn(name="genre_id", referencedColumnName="id")
     */
    private $genre;

    /**
     * @ORM\ManyToOne(targetEntity="RedCrossRelation", inversedBy="rosterMember")
     * @ORM\JoinColumn(name="red_cross_relation_id", referencedColumnName="id")
     */
    private $redCrossRelation;

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
     * @ORM\ManyToMany(targetEntity="Language", inversedBy="rosterMembers")
     * @ORM\JoinTable(name="rostermember_languages")
     */
    private $languages;

    /**
     * @ORM\ManyToMany(targetEntity="EruType", inversedBy="rosterMembers", cascade={"persist"})
     * @ORM\JoinTable(name="rostermember_erutypes")
     */
    private $eruTypes;

    /**
     * @ORM\ManyToMany(targetEntity="Skill", inversedBy="rosterMembers")
     * @ORM\JoinTable(name="rostermember_skills")
     */
    private $skills;

    /**
     * @ORM\ManyToOne(targetEntity="TerritorialOffice", inversedBy="rosterMembers")
     * @ORM\JoinColumn(name="territorial_office_id", referencedColumnName="id")
     */
    private $territorialOffice;

    /**
     * @ORM\ManyToMany(targetEntity="WorkGroup", mappedBy="rosterMembers")
     */
    private $workGroups;

    /**
     * @ORM\ManyToMany(targetEntity="Activity", mappedBy="rosterMembers")
     */
    private $activities;

    /**
     * @ORM\OneToMany(targetEntity="Deployment", mappedBy="rosterMember")
     */
    private $deployments;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->languages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->eruTypes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->skills = new \Doctrine\Common\Collections\ArrayCollection();
        $this->workGroups = new \Doctrine\Common\Collections\ArrayCollection();
        $this->activities = new \Doctrine\Common\Collections\ArrayCollection();
        $this->deployments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        $rosterMemberName = 'Miembro del roster';
        if ($this->name) {
            $rosterMemberName = $this->name;

            if ($this->surname) {
                $rosterMemberName .= ' ' . $this->surname;
            }
        }

        return $rosterMemberName;
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
     * @return RosterMember
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
     * Set surname
     *
     * @param string $surname
     * @return RosterMember
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set mobilePhone
     *
     * @param string $mobilePhone
     * @return RosterMember
     */
    public function setMobilePhone($mobilePhone)
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }

    /**
     * Get mobilePhone
     *
     * @return string 
     */
    public function getMobilePhone()
    {
        return $this->mobilePhone;
    }

    /**
     * Set extraPhone
     *
     * @param string $extraPhone
     * @return RosterMember
     */
    public function setExtraPhone($extraPhone)
    {
        $this->extraPhone = $extraPhone;

        return $this;
    }

    /**
     * Get extraPhone
     *
     * @return string 
     */
    public function getExtraPhone()
    {
        return $this->extraPhone;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return RosterMember
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return RosterMember
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return RosterMember
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
     * @return RosterMember
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
     * Add languages
     *
     * @param \AppBundle\Entity\Language $languages
     * @return RosterMember
     */
    public function addLanguage(\AppBundle\Entity\Language $languages)
    {
        $this->languages[] = $languages;

        return $this;
    }

    /**
     * Remove languages
     *
     * @param \AppBundle\Entity\Language $languages
     */
    public function removeLanguage(\AppBundle\Entity\Language $languages)
    {
        $this->languages->removeElement($languages);
    }

    /**
     * Get languages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * Add eruTypes
     *
     * @param \AppBundle\Entity\EruType $eruTypes
     * @return RosterMember
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
     * Add skills
     *
     * @param \AppBundle\Entity\Skill $skills
     * @return RosterMember
     */
    public function addSkill(\AppBundle\Entity\Skill $skills)
    {
        $this->skills[] = $skills;

        return $this;
    }

    /**
     * Remove skills
     *
     * @param \AppBundle\Entity\Skill $skills
     */
    public function removeSkill(\AppBundle\Entity\Skill $skills)
    {
        $this->skills->removeElement($skills);
    }

    /**
     * Get skills
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Set territorialOffice
     *
     * @param \AppBundle\Entity\TerritorialOffice $territorialOffice
     * @return RosterMember
     */
    public function setTerritorialOffice(\AppBundle\Entity\TerritorialOffice $territorialOffice = null)
    {
        $this->territorialOffice = $territorialOffice;

        return $this;
    }

    /**
     * Get territorialOffice
     *
     * @return \AppBundle\Entity\TerritorialOffice 
     */
    public function getTerritorialOffice()
    {
        return $this->territorialOffice;
    }

    /**
     * Set responsibleStatement
     *
     * @param boolean $responsibleStatement
     * @return RosterMember
     */
    public function setResponsibleStatement($responsibleStatement)
    {
        $this->responsibleStatement = $responsibleStatement;

        return $this;
    }

    /**
     * Get responsibleStatement
     *
     * @return boolean 
     */
    public function getResponsibleStatement()
    {
        return $this->responsibleStatement;
    }

    /**
     * Set genre
     *
     * @param \AppBundle\Entity\Genre $genre
     * @return RosterMember
     */
    public function setGenre(\AppBundle\Entity\Genre $genre = null)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return \AppBundle\Entity\Genre 
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set redCrossRelation
     *
     * @param \AppBundle\Entity\RedCrossRelation $redCrossRelation
     * @return RosterMember
     */
    public function setRedCrossRelation(\AppBundle\Entity\RedCrossRelation $redCrossRelation = null)
    {
        $this->redCrossRelation = $redCrossRelation;

        return $this;
    }

    /**
     * Get redCrossRelation
     *
     * @return \AppBundle\Entity\RedCrossRelation 
     */
    public function getRedCrossRelation()
    {
        return $this->redCrossRelation;
    }

    /**
     * Add workGroups
     *
     * @param \AppBundle\Entity\WorkGroup $workGroups
     * @return RosterMember
     */
    public function addWorkGroup(\AppBundle\Entity\WorkGroup $workGroups)
    {
        $this->workGroups[] = $workGroups;

        return $this;
    }

    /**
     * Remove workGroups
     *
     * @param \AppBundle\Entity\WorkGroup $workGroups
     */
    public function removeWorkGroup(\AppBundle\Entity\WorkGroup $workGroups)
    {
        $this->workGroups->removeElement($workGroups);
    }

    /**
     * Get workGroups
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getWorkGroups()
    {
        return $this->workGroups;
    }

    /**
     * Add activities
     *
     * @param \AppBundle\Entity\Activity $activities
     * @return RosterMember
     */
    public function addActivity(\AppBundle\Entity\Activity $activities)
    {
        $this->activities[] = $activities;

        return $this;
    }

    /**
     * Remove activities
     *
     * @param \AppBundle\Entity\Activity $activities
     */
    public function removeActivity(\AppBundle\Entity\Activity $activities)
    {
        $this->activities->removeElement($activities);
    }

    /**
     * Get activities
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getActivities()
    {
        return $this->activities;
    }

    /**
     * Add deployments
     *
     * @param \AppBundle\Entity\Deployment $deployments
     * @return RosterMember
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
