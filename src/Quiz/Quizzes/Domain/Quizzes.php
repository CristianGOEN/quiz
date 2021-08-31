<?php

declare(strict_types=1);

namespace App\Quiz\Quizzes\Domain;

use App\Shared\Domain\Collection;

final class Quizzes  extends Collection
{
    protected function type(): string
    {
        return Quiz::class;
    }
}