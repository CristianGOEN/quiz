<?php

declare(strict_types=1);

namespace App\Quiz\Quizzes\Domain;

use App\Quiz\Shared\Domain\Quizzes\QuizId;

interface QuizRepository
{
    public function save(Quiz $quiz): void;
    public function search(QuizId $id): ?Quiz;
    public function searchAll(): ?Quizzes;
    public function update(Quiz $quiz): void;
    public function delete(QuizId $id): void;
}