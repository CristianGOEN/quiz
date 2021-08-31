<?php

declare(strict_types=1);

namespace App\Quiz\Questions\Domain;

use App\Quiz\Answers\Domain\Answer;
use App\Quiz\Quizzes\Domain\Quiz;
use App\Quiz\Shared\Domain\Questions\QuestionId;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

final class Question
{
    private $answers;

    public function __construct(private QuestionId $id, private QuestionText $text, private Quiz $quiz)
    {
        $this->answers = new ArrayCollection();
    }

    public static function create(QuestionId $id, QuestionText $text, Quiz $quiz): self
    {
        return new self($id, $text, $quiz);
    }

    public function id(): QuestionId
    {
        return $this->id;
    }

    public function text(): QuestionText
    {
        return $this->text;
    }

    /**
     * @return Collection|Answer[]
     */
    public function answers(): Collection
    {
        return $this->answers;
    }

    public function quiz(): Quiz
    {
        return $this->quiz;
    }
}