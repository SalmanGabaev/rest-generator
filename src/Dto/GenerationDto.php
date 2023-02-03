<?php

declare(strict_types=1);

namespace App\Dto;

use JsonSerializable;

class GenerationDto implements JsonSerializable
{
    public function __construct(
        private readonly int $id,
        private readonly string $generation,
    ){
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: (int)$data['id'],
            generation: (string)$data['generation'],
        );
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getGeneration(): string
    {
        return $this->generation;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->getId(),
            'generation' => $this->getGeneration(),
        ];
    }
}
