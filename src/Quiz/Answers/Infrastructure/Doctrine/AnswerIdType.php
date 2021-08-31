<?php

declare(strict_types=1);

namespace App\Quiz\Answers\Infrastructure\Doctrine;

use App\Quiz\Answers\Domain\AnswerId;
use App\Shared\Domain\ValueObject\Uuid;
use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Platforms\AbstractPlatform;

final class AnswerIdType extends StringType
{
    const MYTYPE = 'answer_id';

    protected function typeClassName(): string
    {
        return AnswerId::class;
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