<?php

namespace App\Entity;
use App\Entity\Artikle;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
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
    private $name;
    /**
     * @ORM\OneToMany(targetEntity="Artikle" , mappedBy="user1")
     * @var type 
     */
    private $artikle;
            
     /**
     * @ORM\OneToMany(targetEntity="Coment" , mappedBy="userComent")
     * @var type 
     */
    private $coment;
            

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
    public function __toString() {
        return $this->getName();
    }
}
