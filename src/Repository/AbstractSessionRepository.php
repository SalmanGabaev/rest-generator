<?php

declare(strict_types=1);

namespace App\Repository;

abstract class AbstractSessionRepository
{
    public function __construct()
    {
        session_start();
    }

    public function set(array $value): void
    {
        $_SESSION[$this->tableName()] = json_encode($value, JSON_PRETTY_PRINT);
    }

    public function get(): array
    {
        return json_decode($_SESSION[$this->tableName()], true);
    }

    abstract protected function tableName(): string;
}
