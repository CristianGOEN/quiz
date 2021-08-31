<?php

declare(strict_types=1);


namespace App\Quiz\Questions\Application\Find;


final class QuestionResponse
{
    public function __construct(private string $id, private string $quizId, private string $text)
    {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function quizId(): string
    {
        return $this->quizId;
    }

    public function text(): string
    {
        return $this->text;
    }

    public function toPrimitives(): array
    {
        return [
            'id' => $this->id,
            'quizId' => $this->quizId,
            'text' => $this->text
        ];
    }
}