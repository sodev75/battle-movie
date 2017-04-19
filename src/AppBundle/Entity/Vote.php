<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
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
    private $note;
    
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
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return the $idUtilisateur
     */
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

 

    /**
     * @param int $idUtilisateur
     */
    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;
    }
   
    /**
     * @return the $note
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @return the $idFilm
     */
    public function getIdFilm()
    {
        return $this->idFilm;
    }

    /**
     * @param int $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @param int $idFilm
     */
    public function setIdFilm($idFilm)
    {
        $this->idFilm = $idFilm;
    }
  



    
    
    


   
}
