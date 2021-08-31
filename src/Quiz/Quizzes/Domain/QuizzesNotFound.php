<?php

declare(strict_types=1);

namespace App\Quiz\Quizzes\Domain;

use RuntimeException;

final class QuizzesNotFound extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('Quizzes not found');
    }
}