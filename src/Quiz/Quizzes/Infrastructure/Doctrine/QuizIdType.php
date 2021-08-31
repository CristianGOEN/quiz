<?php

declare(strict_types=1);

namespace App\Quiz\Quizzes\Infrastructure\Doctrine;

use App\Quiz\Shared\Domain\Quizzes\QuizId;
use App\Shared\Domain\ValueObject\Uuid;
use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Platforms\AbstractPlatform;

final class QuizIdType  extends StringType
{
    const MYTYPE = 'quiz_id';

    protected function typeClassName(): string
    {
        return QuizId::class;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $className = $this->typeClassName();

        return new $className($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        /** @var Uuid $value */
        return $value->value();
    }

    public function getName(): string
    {
        return self::MYTYPE;
    }
}