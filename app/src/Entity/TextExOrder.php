<?php

namespace App\Entity;

use App\Repository\TextExOrderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TextExOrderRepository::class)]
class TextExOrder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'textExOrders')]
    private ?TextEx $textEx = null;

    #[ORM\Column]
    private ?int $orderN = null;

    #[ORM\ManyToOne(inversedBy: 'texts')]
    private ?Page $page = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTextEx(): ?TextEx
    {
        return $this->textEx;
    }

    public function setTextEx(?TextEx $textEx): static
    {
        $this->textEx = $textEx;

        return $this;
    }

    public function getOrderN(): ?int
    {
        return $this->orderN;
    }

    public function setOrderN(int $orderN): static
    {
        $this->orderN = $orderN;

        return $this;
    }

    public function getPage(): ?Page
    {
        return $this->page;
    }

    public function setPage(?Page $page): static
    {
        $this->page = $page;

        return $this;
    }
}
