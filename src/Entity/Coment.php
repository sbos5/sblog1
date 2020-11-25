<?php

namespace App\Entity;

use App\Repository\ComentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ComentRepository::class)
 */
class Coment
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
    private $content;
     /**
     * @ORM\OneToOne(targetEntity="User" , inversedBy="coment")
     * @var type 
     */
    private $userComent;
            
     /**
     * @ORM\OneToOne(targetEntity="Artikle" , inversedBy="user1")
     * @var type 
     */
    private $art;
            


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }
}
