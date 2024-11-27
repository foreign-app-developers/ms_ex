<?php

namespace App\Entity;

use App\Repository\TextExRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TextExRepository::class)]
class TextEx
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $sentense = null;

    #[ORM\Column]
    private array $ans = [];

    #[ORM\Column]
    private ?int $userId = null;

    /**
     * @var Collection<int, TextExOrder>
     */
    #[ORM\OneToMany(targetEntity: TextExOrder::class, mappedBy: 'textEx')]
    private Collection $textExOrders;

    public function __construct()
    {
        $this->textExOrders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSentense(): ?string
    {
        return $this->sentense;
    }

    public function setSentense(string $sentense): static
    {
        $this->sentense = $sentense;

        return $this;
    }

    public function getAns(): array
    {
        return $this->ans;
    }

    public function setAns(array $ans): static
    {
        $this->ans = $ans;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return Collection<int, TextExOrder>
     */
    public function getTextExOrders(): Collection
    {
        return $this->textExOrders;
    }

    public function addTextExOrder(TextExOrder $textExOrder): static
    {
        if (!$this->textExOrders->contains($textExOrder)) {
            $this->textExOrders->add($textExOrder);
            $textExOrder->setTextEx($this);
        }

        return $this;
    }

    public function removeTextExOrder(TextExOrder $textExOrder): static
    {
        if ($this->textExOrders->removeElement($textExOrder)) {
            // set the owning side to null (unless already changed)
            if ($textExOrder->getTextEx() === $this) {
                $textExOrder->setTextEx(null);
            }
        }

        return $this;
    }
}
