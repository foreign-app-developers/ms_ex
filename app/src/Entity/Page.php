<?php

namespace App\Entity;

use App\Repository\PageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PageRepository::class)]
class Page
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $userId = null;

    /**
     * @var Collection<int, TestExOrder>
     */
    #[ORM\OneToMany(targetEntity: TestExOrder::class, mappedBy: 'page')]
    private Collection $tests;

    /**
     * @var Collection<int, QuizOrder>
     */
    #[ORM\OneToMany(targetEntity: QuizOrder::class, mappedBy: 'page')]
    private Collection $quizes;

    /**
     * @var Collection<int, TextExOrder>
     */
    #[ORM\OneToMany(targetEntity: TextExOrder::class, mappedBy: 'page')]
    private Collection $texts;

    public function __construct()
    {
        $this->tests = new ArrayCollection();
        $this->quizes = new ArrayCollection();
        $this->texts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
    public function getTests(): Collection
    {
        return $this->tests;
    }

    public function addTest(TestExOrder $test): static
    {
        if (!$this->tests->contains($test)) {
            $this->tests->add($test);
            $test->setPage($this);
        }

        return $this;
    }

    public function removeTest(TestExOrder $test): static
    {
        if ($this->tests->removeElement($test)) {
            // set the owning side to null (unless already changed)
            if ($test->getPage() === $this) {
                $test->setPage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, QuizOrder>
     */
    public function getQuizes(): Collection
    {
        return $this->quizes;
    }

    public function addQuize(QuizOrder $quize): static
    {
        if (!$this->quizes->contains($quize)) {
            $this->quizes->add($quize);
            $quize->setPage($this);
        }

        return $this;
    }

    public function removeQuize(QuizOrder $quize): static
    {
        if ($this->quizes->removeElement($quize)) {
            // set the owning side to null (unless already changed)
            if ($quize->getPage() === $this) {
                $quize->setPage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TextExOrder>
     */
    public function getTexts(): Collection
    {
        return $this->texts;
    }

    public function addText(TextExOrder $text): static
    {
        if (!$this->texts->contains($text)) {
            $this->texts->add($text);
            $text->setPage($this);
        }

        return $this;
    }

    public function removeText(TextExOrder $text): static
    {
        if ($this->texts->removeElement($text)) {
            // set the owning side to null (unless already changed)
            if ($text->getPage() === $this) {
                $text->setPage(null);
            }
        }

        return $this;
    }
}
