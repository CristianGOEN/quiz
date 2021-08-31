<?php

declare(strict_types=1);

namespace App\Quiz\Answers\Infrastructure\Doctrine;

use App\Quiz\Shared\Domain\Questions\QuestionId;
use App\Shared\Domain\ValueObject\Uuid;
use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Platforms\AbstractPlatform;

final class AnswerIdType  extends StringType
{
    const MYTYPE = 'answerId';

    protected function typeClassName(): string
    {
        return QuestionId::class;
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

    public function getName()
    {
        return self::MYTYPE;
    }
}