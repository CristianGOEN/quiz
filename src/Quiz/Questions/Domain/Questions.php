<?php

declare(strict_types=1);

namespace App\Quiz\Questions\Domain;

use App\Shared\Domain\Collection;

final class Questions extends Collection
{
    protected function type(): string
    {
        return Question::class;
    }
}