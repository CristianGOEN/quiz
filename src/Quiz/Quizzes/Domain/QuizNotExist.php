<?php

declare(strict_types=1);

namespace App\Quiz\Quizzes\Domain;

use RuntimeException;

final class QuizNotExist extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('The quiz does not exist');
    }
}
