<?php

namespace App\Entity;

use App\Repository\TestExOrderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TestExOrderRepository::class)]
class TestExOrder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'testExOrders')]
    private ?TestEx $testEx = null;

    #[ORM\Column]
    private ?int $orderN = null;

    #[ORM\ManyToOne(inversedBy: 'tests')]
    private ?Page $page = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTestEx(): ?TestEx
    {
        return $this->testEx;
    }

    public function setTestEx(?TestEx $testEx): static
    {
        $this->testEx = $testEx;

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
