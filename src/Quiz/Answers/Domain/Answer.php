<?php

declare(strict_types=1);

namespace App\Quiz\Answers\Domain;

use App\Quiz\Questions\Domain\Question;
use App\Quiz\Shared\Domain\Questions\QuestionId;

final class Answer
{
    private $question;

    public function __construct(private AnswerId $id, private QuestionId $questionId, private AnswerText $text, private bool $correct)
    {
    }

    public static function create(AnswerId $id, QuestionId $questionId, AnswerText $text, bool $correct): self
    {
        return new self($id, $questionId, $text, $correct);
    }

    public function id(): AnswerId
    {
        return $this->id;
    }

    public function questionId(): QuestionId
    {
        return $this->questionId;
    }

    public function text(): AnswerText
    {
        return $this->text;
    }

    public function correct(): bool
    {
        return $this->correct;
    }

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(?Question $question): self
    {
        $this->question = $question;

        return $this;
    }
}