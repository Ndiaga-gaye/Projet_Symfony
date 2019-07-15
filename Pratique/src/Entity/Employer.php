<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmployerRepository")
 */
class Employer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Matricule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nomcomplet;

    /**
     * @ORM\Column(type="date")
     */
    private $Datenaissance;

    /**
     * @ORM\Column(type="integer")
     */
    private $Salaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Service", inversedBy="employers")
     */
    private $idservice;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->Matricule;
    }

    public function setMatricule(string $Matricule): self
    {
        $this->Matricule = $Matricule;

        return $this;
    }

    public function getNomcomplet(): ?string
    {
        return $this->Nomcomplet;
    }

    public function setNomcomplet(string $Nomcomplet): self
    {
        $this->Nomcomplet = $Nomcomplet;

        return $this;
    }

    public function getDatenaissance(): ?\DateTimeInterface
    {
        return $this->Datenaissance;
    }

    public function setDatenaissance(\DateTimeInterface $Datenaissance): self
    {
        $this->Datenaissance = $Datenaissance;

        return $this;
    }

    public function getSalaire(): ?int
    {
        return $this->Salaire;
    }

    public function setSalaire(int $Salaire): self
    {
        $this->Salaire = $Salaire;

        return $this;
    }

    public function getIdservice(): ?Service
    {
        return $this->idservice;
    }

    public function setIdservice(?Service $idservice): self
    {
        $this->idservice = $idservice;

        return $this;
    }
}
