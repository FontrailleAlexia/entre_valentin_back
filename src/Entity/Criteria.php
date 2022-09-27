<?php

namespace App\Entity;

use App\Entity\Style;
use App\Entity\Origin;
use App\Entity\Hobbies;
use App\Entity\ParticularSign;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CriteriaRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: CriteriaRepository::class)]
class Criteria
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $size = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $silhouete = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $alcohol = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tobacco = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $eyes = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $hair = null;

    #[ORM\ManyToMany(targetEntity: ParticularSign::class, mappedBy: 'id_criteria')]
    private Collection $particularSigns;

    #[ORM\ManyToMany(targetEntity: Origin::class, mappedBy: 'id_criteria')]
    private Collection $origins;

    #[ORM\ManyToMany(targetEntity: Style::class, mappedBy: 'id_criteria')]
    private Collection $styles;

    #[ORM\ManyToMany(targetEntity: Hobbies::class, mappedBy: 'id_criteria')]
    private Collection $hobbies;

    #[ORM\ManyToOne(inversedBy: 'criterias')]
    private ?User $user = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updated_at = null;

    public function __construct()
    {
        $this->particularSigns = new ArrayCollection();
        $this->origins = new ArrayCollection();
        $this->styles = new ArrayCollection();
        $this->hobbies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(?int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getSilhouete(): ?string
    {
        return $this->silhouete;
    }

    public function setSilhouete(?string $silhouete): self
    {
        $this->silhouete = $silhouete;

        return $this;
    }

    public function getAlcohol(): ?string
    {
        return $this->alcohol;
    }

    public function setAlcohol(?string $alcohol): self
    {
        $this->alcohol = $alcohol;

        return $this;
    }

    public function getTobacco(): ?string
    {
        return $this->tobacco;
    }

    public function setTobacco(?string $tobacco): self
    {
        $this->tobacco = $tobacco;

        return $this;
    }

    public function getEyes(): ?string
    {
        return $this->eyes;
    }

    public function setEyes(?string $eyes): self
    {
        $this->eyes = $eyes;

        return $this;
    }

    public function getHair(): ?string
    {
        return $this->hair;
    }

    public function setHair(?string $hair): self
    {
        $this->hair = $hair;

        return $this;
    }

    /**
     * @return Collection<int, ParticularSign>
     */
    public function getParticularSigns(): Collection
    {
        return $this->particularSigns;
    }

    public function addParticularSign(ParticularSign $particularSign): self
    {
        if (!$this->particularSigns->contains($particularSign)) {
            $this->particularSigns->add($particularSign);
            $particularSign->addIdCriterion($this);
        }

        return $this;
    }

    public function removeParticularSign(ParticularSign $particularSign): self
    {
        if ($this->particularSigns->removeElement($particularSign)) {
            $particularSign->removeIdCriterion($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Origin>
     */
    public function getOrigins(): Collection
    {
        return $this->origins;
    }

    public function addOrigin(Origin $origin): self
    {
        if (!$this->origins->contains($origin)) {
            $this->origins->add($origin);
            $origin->addIdCriterion($this);
        }

        return $this;
    }

    public function removeOrigin(Origin $origin): self
    {
        if ($this->origins->removeElement($origin)) {
            $origin->removeIdCriterion($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Style>
     */
    public function getStyles(): Collection
    {
        return $this->styles;
    }

    public function addStyle(Style $style): self
    {
        if (!$this->styles->contains($style)) {
            $this->styles->add($style);
            $style->addIdCriterion($this);
        }

        return $this;
    }

    public function removeStyle(Style $style): self
    {
        if ($this->styles->removeElement($style)) {
            $style->removeIdCriterion($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Hobbies>
     */
    public function getHobbies(): Collection
    {
        return $this->hobbies;
    }

    public function addHobby(Hobbies $hobby): self
    {
        if (!$this->hobbies->contains($hobby)) {
            $this->hobbies->add($hobby);
            $hobby->addIdCriterion($this);
        }

        return $this;
    }

    public function removeHobby(Hobbies $hobby): self
    {
        if ($this->hobbies->removeElement($hobby)) {
            $hobby->removeIdCriterion($this);
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
