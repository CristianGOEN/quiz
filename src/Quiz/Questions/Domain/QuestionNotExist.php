<?php

declare(strict_types=1);

namespace App\Quiz\Questions\Domain;

use RuntimeException;

final class QuestionNotExist extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('The question does not exist');
    }
}
