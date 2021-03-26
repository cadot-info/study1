<?php

namespace App\Entity;

use App\Repository\ActualiteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActualiteRepository::class)
 */
class Actualite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $UrlImage;

    /**
     * @ORM\Column(type="text")
     */
    private $Texte;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Alt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getUrlImage(): ?string
    {
        return $this->UrlImage;
    }

    public function setUrlImage(string $UrlImage): self
    {
        $this->UrlImage = $UrlImage;

        return $this;
    }

    public function getTexte(): ?string
    {
        return $this->Texte;
    }

    public function setTexte(string $Texte): self
    {
        $this->Texte = $Texte;

        return $this;
    }

    public function getAlt(): ?string
    {
        return $this->Alt;
    }

    public function setAlt(string $Alt): self
    {
        $this->Alt = $Alt;

        return $this;
    }
}
