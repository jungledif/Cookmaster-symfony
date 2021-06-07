<?php

namespace App\Entity;

use App\Repository\RecipeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecipeRepository::class)
 */
class Recipe
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
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptive;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $level;

    /**
     * @ORM\Column(type="text")
     */
    private $step1;

    /**
     * @ORM\Column(type="text")
     */
    private $step2;

    /**
     * @ORM\Column(type="text")
     */
    private $step3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $recipeImg;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cooktime;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $servings;

    /**
     * @ORM\Column(type="date", length=255, nullable=true)
     */
    private $creationDate;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="recipes")
     */
    private $author;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescriptive(): ?string
    {
        return $this->descriptive;
    }

    public function setDescriptive(?string $descriptive): self
    {
        $this->descriptive = $descriptive;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getStep1(): ?string
    {
        return $this->step1;
    }

    public function setStep1(string $step1): self
    {
        $this->step1 = $step1;

        return $this;
    }

    public function getStep2(): ?string
    {
        return $this->step2;
    }

    public function setStep2(string $step2): self
    {
        $this->step2 = $step2;

        return $this;
    }

    public function getStep3(): ?string
    {
        return $this->step3;
    }

    public function setStep3(string $step3): self
    {
        $this->step3 = $step3;

        return $this;
    }

    public function getRecipeImg(): ?string
    {
        return $this->recipeImg;
    }

    public function setRecipeImg(?string $recipeImg): self
    {
        $this->recipeImg = $recipeImg;

        return $this;
    }

    public function getCooktime(): ?string
    {
        return $this->cooktime;
    }

    public function setCooktime(string $cooktime): self
    {
        $this->cooktime = $cooktime;

        return $this;
    }

    public function getServings(): ?string
    {
        return $this->servings;
    }

    public function setServings(string $servings): self
    {
        $this->servings = $servings;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }
}
