<?php

declare(strict_types=1);

namespace App\Quiz\Questions\Infrastructure\Doctrine;

use App\Quiz\Shared\Domain\Questions\QuestionId;
use App\Shared\Domain\ValueObject\Uuid;
use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Platforms\AbstractPlatform;

final class QuestionIdType extends StringType
{
    const MYTYPE = 'question_id';

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

    public function getName(): string
    {
        return self::MYTYPE;
    }
}