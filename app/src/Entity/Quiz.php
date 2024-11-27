<?php

namespace App\Entity;

use App\Repository\QuizRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuizRepository::class)]
class Quiz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $frontside = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $backside = null;

    #[ORM\Column]
    private ?int $userId = null;

    /**
     * @var Collection<int, QuizOrder>
     */
    #[ORM\OneToMany(targetEntity: QuizOrder::class, mappedBy: 'quiz')]
    private Collection $quizOrders;

    public function __construct()
    {
        $this->quizOrders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFrontside(): ?string
    {
        return $this->frontside;
    }

    public function setFrontside(string $frontside): static
    {
        $this->frontside = $frontside;

        return $this;
    }

    public function getBackside(): ?string
    {
        return $this->backside;
    }

    public function setBackside(string $backside): static
    {
        $this->backside = $backside;

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
     * @return Collection<int, QuizOrder>
     */
    public function getQuizOrders(): Collection
    {
        return $this->quizOrders;
    }

    public function addQuizOrder(QuizOrder $quizOrder): static
    {
        if (!$this->quizOrders->contains($quizOrder)) {
            $this->quizOrders->add($quizOrder);
            $quizOrder->setQuiz($this);
        }

        return $this;
    }

    public function removeQuizOrder(QuizOrder $quizOrder): static
    {
        if ($this->quizOrders->removeElement($quizOrder)) {
            // set the owning side to null (unless already changed)
            if ($quizOrder->getQuiz() === $this) {
                $quizOrder->setQuiz(null);
            }
        }

        return $this;
    }
}
