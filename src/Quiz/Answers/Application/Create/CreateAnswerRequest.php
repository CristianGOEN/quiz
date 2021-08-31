<?php

declare(strict_types=1);

namespace App\Quiz\Answers\Application\Create;

final class CreateAnswerRequest
{
    public function __construct(private string $id, private string $questionId, private string $text, private string $correct)
    {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function questionId(): string
    {
        return $this->questionId;
    }

    public function text(): string
    {
        return $this->text;
    }

    public function correct(): string
    {
        return $this->correct;
    }
}