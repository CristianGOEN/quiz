<?php

declare(strict_types=1);

namespace App\Quiz\Answers\Domain;

interface AnswerRepository
{
    public function save(Answer $answer): void;
    public function search(AnswerId $id): ?Answer;
    public function update(Answer $answer): void;
    public function delete(AnswerId $id): void;
}