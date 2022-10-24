<?php

namespace App\Entity;

use App\Repository\TimestampRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TimestampRepository::class)]
trait Timestamp
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    #[ORM\PrePersist]
    public function prePersist()
    {
        $this->createdAt = new \DateTime();
    }
}
