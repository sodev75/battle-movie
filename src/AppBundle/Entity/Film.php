<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use AppBundle\Entity\Saga;

/**
 * Film
 *
 * @ORM\Table(name="film")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FilmRepository")
 * 
 */
class Film
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="realisateur", type="string", length=255)
     */
    private $realisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="annee", type="string", length=255)
     */
    private $annee;

   
    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="Saga")
     * @ORM\JoinColumn(name="id_saga", referencedColumnName="id")
     */
    private $idSaga;


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
     * Set titre
     *
     * @param string $titre
     * @return Film
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set realisateur
     *
     * @param string $realisateur
     * @return Film
     */
    public function setRealisateur($realisateur)
    {
        $this->realisateur = $realisateur;

        return $this;
    }

    /**
     * Get realisateur
     *
     * @return string 
     */
    public function getRealisateur()
    {
        return $this->realisateur;
    }

    /**
     * Set annee
     *
     * @param \DateTime $annee
     * @return Film
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return \DateTime 
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set idSaga
     *
     * @param integer $idSaga
     * @return Film
     */
    public function setIdSaga($idSaga)
    {
        $this->idSaga = $idSaga;

        return $this;
    }

    /**
     * Get idSaga
     *
     * @return integer 
     */
    public function getIdSaga()
    {
        return $this->idSaga;
    }
}
