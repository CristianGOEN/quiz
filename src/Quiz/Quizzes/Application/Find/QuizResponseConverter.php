<?php

declare(strict_types=1);

namespace App\Quiz\Quizzes\Application\Find;

use App\Quiz\Quizzes\Domain\Quiz;

final class QuizResponseConverter
{
    public static function create(Quiz $quiz): QuizResponse
    {
        return new QuizResponse(
            $quiz->id()->value(),
            $quiz->title()->value()
        );
    }
}