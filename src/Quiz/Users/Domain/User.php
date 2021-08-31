<?php

declare(strict_types=1);

namespace App\Quiz\Users\Domain;

final class User
{
    public function __construct(private UserId $id, private UserName $name, private UserEmail $email, private UserPassword $password)
    {
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function name(): UserName
    {
        return $this->name;
    }

    public function email(): UserEmail
    {
        return $this->email;
    }

    public function password(): UserPassword
    {
        return $this->password;
    }

    public static function create(UserId $id, UserName $name, UserEmail $email, UserPassword $password): self
    {
        return new self($id, $name, $email, $password);
    }
}
