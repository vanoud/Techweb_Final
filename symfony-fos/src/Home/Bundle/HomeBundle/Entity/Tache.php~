<?php

namespace Home\Bundle\HomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tache
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Tache
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
     * @ORM\Column(name="description", type="string", length=255)
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
     * @return Tache
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
     * @return Tache
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
    * @ORM\ManyToOne(targetEntity="Project", inversedBy="tache")
    * @ORM\JoinColumn(name="projectid", referencedColumnName="id")
    */
    private $projectid;


    /**
     * Set projectid
     *
     * @param \Home\Bundle\HomeBundle\Entity\Project $projectid
     * @return Tache
     */
    public function setProjectid(\Home\Bundle\HomeBundle\Entity\Project $projectid = null)
    {
        $this->projectid = $projectid;
    
        return $this;
    }

    /**
     * Get projectid
     *
     * @return \Home\Bundle\HomeBundle\Entity\Project 
     */
    public function getProjectid()
    {
        return $this->projectid;
    }

    /**
    * @ORM\Column(name="dateDbut", type="datetime")
    *
    * @var \DateTime
    */
    protected $dateDebut;

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     * @return Tache
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
    * @ORM\Column(name="dateFin", type="datetime")
    *
    * @var \DateTime
    */
    protected $dateFin;

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     * @return Tache
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
}