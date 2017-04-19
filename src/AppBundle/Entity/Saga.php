<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Saga
 *
 * @ORM\Table(name="saga")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SagaRepository")
 */
class Saga
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
     * @ORM\Column(name="nom_saga", type="string", length=255)
     */
    private $nomSaga;


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
     * Set nomSaga
     *
     * @param string $nomSaga
     * @return Saga
     */
    public function setNomSaga($nomSaga)
    {
        $this->nomSaga = $nomSaga;

        return $this;
    }

    /**
     * Get nomSaga
     *
     * @return string 
     */
    public function getNomSaga()
    {
        return $this->nomSaga;
    }
}
