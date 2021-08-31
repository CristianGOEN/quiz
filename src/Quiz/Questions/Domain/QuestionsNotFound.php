<?php

declare(strict_types=1);

namespace App\Quiz\Questions\Domain;

use RuntimeException;

final class QuestionsNotFound extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('Questions not found');
    }
}