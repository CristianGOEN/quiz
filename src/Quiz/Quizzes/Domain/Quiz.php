<?php

declare(strict_types=1);

namespace App\Quiz\Quizzes\Domain;

use App\Quiz\Questions\Domain\Question;
use App\Quiz\Shared\Domain\Quizzes\QuizId;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

final class Quiz
{
    private $questions;

    public function __construct(private QuizId $id, private QuizTitle $title)
    {
        $this->questions = new ArrayCollection();
    }

    public function id(): QuizId
    {
        return $this->id;
    }

    public function title(): QuizTitle
    {
        return $this->title;
    }

    public static function create(QuizId $id, QuizTitle $title): self
    {
        return new self($id, $title);
    }

    /**
     * @return Collection|Question[]
     */
    public function questions(): Collection
    {
        return $this->questions;
    }

    /*
    public function updateQuestions(Questions $questions): void
    {
        $this->questions = $questions;
    }
    */
}
