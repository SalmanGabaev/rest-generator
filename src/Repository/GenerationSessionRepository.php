<?php

declare(strict_types=1);

namespace App\Repository;

use App\Dto\GenerationDto;
use App\Helper\UniqueGenerationHelper;

class GenerationSessionRepository extends AbstractSessionRepository
{
    private const TABLE_NAME = 'generations';

    public function getById(int $id): ?GenerationDto
    {
        $data = $this->get();
        $filterable = array_filter($data, fn ($item) => $item['id'] === $id);
        $item = array_shift($filterable);

        if (empty($item)) {
            return null;
        }

        return GenerationDto::fromArray($item);
    }

    public function generate(): GenerationDto
    {
        $generationDto = new GenerationDto(
            id: $this->generateId(),
            generation: $this->generateUnique(),
        );

        $data = $this->get();
        $data[] = $generationDto->jsonSerialize();
        $this->set($data);

        return $generationDto;
    }

    protected function tableName(): string
    {
        return self::TABLE_NAME;
    }

    private function generateId(): int
    {
        $data = $this->get();
        if (empty($data)) {
            return 1;
        }

        $last = end($data);
        return $last['id'] + 1;
    }

    private function generateUnique(): string
    {
        return UniqueGenerationHelper::generate();
    }
}
