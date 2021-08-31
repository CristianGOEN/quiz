<?php

declare(strict_types=1);

namespace App\Quiz\Answers\Domain;

use App\Quiz\Questions\Domain\Question;

final class Answer
{
    public function __construct(private AnswerId $id, private AnswerText $text, private bool $correct, private Question $question)
    {
    }

    public static function create(AnswerId $id, AnswerText $text, bool $correct, Question $question): self
    {
        return new self($id, $text, $correct, $question);
    }

    public function id(): AnswerId
    {
        return $this->id;
    }

    public function question(): Question
    {
        return $this->question;
    }

    public function text(): AnswerText
    {
        return $this->text;
    }

    public function correct(): bool
    {
        return $this->correct;
    }
}