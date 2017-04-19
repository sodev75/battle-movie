<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Film;
use AppBundle\Entity\Utilisateur;

/**
 * Vote
 *
 * @ORM\Table(name="vote")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VoteRepository")
 */
class Vote
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
     * @var int
     * @ORM\Column(name="note", type="integer")
     */
    public $note;

     /**
     * @var int
     * @ORM\ManyToOne(targetEntity="Film")
     * @ORM\JoinColumn(name="id_film", referencedColumnName="id")
     */
    private $idFilm;

     /**
     * @var int
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id")
     */
    private $idUtilisateur;
    


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
     * Set note
     *
     * @param integer $note
     * @return Vote
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return integer 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set idFilm
     *
     * @param integer $idFilm
     * @return Vote
     */
    public function setIdFilm($idFilm)
    {
        $this->idFilm = $idFilm;

        return $this;
    }

    /**
     * Get idFilm
     *
     * @return integer 
     */
    public function getIdFilm()
    {
        return $this->idFilm;
    }

    /**
     * Set idUtilisateur
     *
     * @param integer $idUtilisateur
     * @return Vote
     */
    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

    /**
     * Get idUtilisateur
     *
     * @return integer 
     */
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }
}
