<?php

namespace App\Entity;
use App\Entity\User;
use App\Repository\ArtikleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArtikleRepository::class)
 */
class Artikle
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User" , inversedBy="artikle")
     * @var type 
     */
    private $user1;
     /**
     * @ORM\OneToMany(targetEntity="Coment" , mappedBy="art")
     * @var type 
     */
    private $coment1;
            

             
     public function getUser1(): ?int
    {
        return $this->user1;
    }
     public function setUser1(?int $user1): self
    {
        $this->user1 = $user1;

        return $this;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }
}
