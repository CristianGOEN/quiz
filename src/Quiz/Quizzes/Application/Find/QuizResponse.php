<?php

declare(strict_types=1);


namespace App\Quiz\Quizzes\Application\Find;


final class QuizResponse
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

    public function toPrimitives(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title
        ];
    }
}