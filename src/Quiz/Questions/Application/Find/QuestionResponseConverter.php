<?php

declare(strict_types=1);

namespace App\Quiz\Questions\Application\Find;

use App\Quiz\Questions\Domain\Question;

final class QuestionResponseConverter
{
    public static function create(Question $quiz): QuestionResponse
    {
        return new QuestionResponse(
            $quiz->id()->value(),
            $quiz->quizId()->value(),
            $quiz->text()->value()
        );
    }
}