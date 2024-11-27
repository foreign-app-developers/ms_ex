<?php

namespace App\Entity;

use App\Repository\TestExRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TestExRepository::class)]
class TestEx
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $task = null;

    #[ORM\Column(length: 255)]
    private ?string $ans = null;

    #[ORM\Column]
    private array $options = [];

    #[ORM\Column]
    private ?int $userId = null;

    /**
     * @var Collection<int, TestExOrder>
     */
    #[ORM\OneToMany(targetEntity: TestExOrder::class, mappedBy: 'testEx')]
    private Collection $testExOrders;

    public function __construct()
    {
        $this->testExOrders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTask(): ?string
    {
        return $this->task;
    }

    public function setTask(?string $task): static
    {
        $this->task = $task;

        return $this;
    }

    public function getAns(): ?string
    {
        return $this->ans;
    }

    public function setAns(string $ans): static
    {
        $this->ans = $ans;

        return $this;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function setOptions(array $options): static
    {
        $this->options = $options;

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
     * @return Collection<int, TestExOrder>
     */
    public function getTestExOrders(): Collection
    {
        return $this->testExOrders;
    }

    public function addTestExOrder(TestExOrder $testExOrder): static
    {
        if (!$this->testExOrders->contains($testExOrder)) {
            $this->testExOrders->add($testExOrder);
            $testExOrder->setTestEx($this);
        }

        return $this;
    }

    public function removeTestExOrder(TestExOrder $testExOrder): static
    {
        if ($this->testExOrders->removeElement($testExOrder)) {
            // set the owning side to null (unless already changed)
            if ($testExOrder->getTestEx() === $this) {
                $testExOrder->setTestEx(null);
            }
        }

        return $this;
    }
}
