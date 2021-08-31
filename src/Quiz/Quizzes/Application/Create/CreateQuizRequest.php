<?php

declare(strict_types=1);

namespace App\Quiz\Quizzes\Application\Create;

final class CreateQuizRequest
{
    public function __construct(private string $id, private string $title)
    {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }
}