<?php

declare(strict_types=1);

namespace App\Quiz\Questions\Domain;

use App\Entity\Answer;
use App\Quiz\Quizzes\Domain\Quiz;
use App\Quiz\Shared\Domain\Questions\QuestionId;
use App\Quiz\Shared\Domain\Quizzes\QuizId;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

final class Question
{
    private $answers;
    private $quiz;

    public function __construct(private QuestionId $id, private QuizId $quizId, private QuestionText $text)
    {
        $this->answers = new ArrayCollection();
    }

    public static function create(QuestionId $id, QuizId $quizId, QuestionText $text): self
    {
        return new self($id, $quizId, $text);
    }

    public function id(): QuestionId
    {
        return $this->id;
    }

    public function quizId(): ?QuizId
    {
        return $this->quizId;
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

    public function getQuiz(): ?Quiz
    {
        return $this->quiz;
    }

    public function setQuiz(?Quiz $quiz): self
    {
        $this->quiz = $quiz;

        return $this;
    }
}