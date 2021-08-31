<?php

declare(strict_types=1);

namespace App\Quiz\Questions\Domain;

use App\Quiz\Shared\Domain\Questions\QuestionId;
use App\Quiz\Shared\Domain\Quizzes\QuizId;

interface QuestionRepository
{
    public function save(Question $question): void;
    public function search(QuestionId $id): ?Question;
    public function searchByQuizId(QuizId $id): ?Questions;
    public function update(Question $question): void;
    public function delete(QuestionId $id): void;
}