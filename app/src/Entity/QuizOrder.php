<?php

namespace App\Entity;

use App\Repository\QuizOrderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuizOrderRepository::class)]
class QuizOrder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'quizOrders')]
    private ?Quiz $quiz = null;

    #[ORM\Column]
    private ?int $orderN = null;

    #[ORM\ManyToOne(inversedBy: 'quizes')]
    private ?Page $page = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuiz(): ?Quiz
    {
        return $this->quiz;
    }

    public function setQuiz(?Quiz $quiz): static
    {
        $this->quiz = $quiz;

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
