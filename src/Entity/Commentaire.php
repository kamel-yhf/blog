<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentaireRepository")
 */
class Commentaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $contentCom;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCom;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContentCom(): ?string
    {
        return $this->contentCom;
    }

    public function setContentCom(?string $contentCom): self
    {
        $this->contentCom = $contentCom;

        return $this;
    }

    public function getDateCom(): ?\DateTimeInterface
    {
        return $this->dateCom;
    }

    public function setDateCom(\DateTimeInterface $dateCom): self
    {
        $this->dateCom = $dateCom;

        return $this;
    }
}
