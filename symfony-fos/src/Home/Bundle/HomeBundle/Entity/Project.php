<?php

namespace Home\Bundle\HomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Project
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

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
     * @return Project
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
     * Set description
     *
     * @param string $description
     * @return Project
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Set date
     *
     * @param string $date
     * @return Project
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return string 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
    * @ORM\OneToMany(targetEntity="Tache", mappedBy="projectid", cascade={"remove"})
    */
    private $taches;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->taches = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add taches
     *
     * @param \Home\Bundle\HomeBundle\Entity\Tache $taches
     * @return Project
     */
    public function addTache(\Home\Bundle\HomeBundle\Entity\Tache $taches)
    {
        $this->taches[] = $taches;
    
        return $this;
    }

    /**
     * Remove taches
     *
     * @param \Home\Bundle\HomeBundle\Entity\Tache $taches
     */
    public function removeTache(\Home\Bundle\HomeBundle\Entity\Tache $taches)
    {
        $this->taches->removeElement($taches);
    }

    /**
     * Get taches
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTaches()
    {
        return $this->taches;
    }

    /**
    * @ORM\Column(name="dateDebutProject", type="datetime")
    *
    * @var \DateTime
    */
    protected $dateDebutProject;

    /**
    * @ORM\Column(name="dateFinProject", type="datetime")
    *
    * @var \DateTime
    */
    protected $dateFinProject;

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     * @return Project
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    
        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime 
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     * @return Project
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    
        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime 
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set dateDebutProject
     *
     * @param \DateTime $dateDebutProject
     * @return Project
     */
    public function setDateDebutProject($dateDebutProject)
    {
        $this->dateDebutProject = $dateDebutProject;
    
        return $this;
    }

    /**
     * Get dateDebutProject
     *
     * @return \DateTime 
     */
    public function getDateDebutProject()
    {
        return $this->dateDebutProject;
    }

    /**
     * Set dateFinProject
     *
     * @param \DateTime $dateFinProject
     * @return Project
     */
    public function setDateFinProject($dateFinProject)
    {
        $this->dateFinProject = $dateFinProject;
    
        return $this;
    }

    /**
     * Get dateFinProject
     *
     * @return \DateTime 
     */
    public function getDateFinProject()
    {
        return $this->dateFinProject;
    }

    /**
    * 
    * @ORM\ManyToOne(targetEntity="Appli\UserBundle\Entity\User", inversedBy="project")
    * @ORM\JoinColumn(name="userid", referencedColumnName="id")
    */
    private $userid;

    /**
     * Set userid
     *
     * @param \Appli\UserBundle\Entity\User $userid
     * @return Project
     */
    public function setUserid(\Appli\UserBundle\Entity\User $userid = null)
    {
        $this->userid = $userid;
    
        return $this;
    }

    /**
     * Get userid
     *
     * @return \Appli\UserBundle\Entity\User 
     */
    public function getUserid()
    {
        return $this->userid;
    }
}