<?php

declare(strict_types=1);

namespace App\UseCase;

use App\Dto\GenerationDto;
use App\Exception\GenerationNotFoundException;
use App\Repository\GenerationSessionRepository;

class GetGenerationUseCase
{
    public function __construct(private readonly GenerationSessionRepository $generationSessionRepository)
    {
    }

    public function execute(int $id): GenerationDto
    {
        $generationDto = $this->generationSessionRepository->getById($id);
        if ($generationDto === null) {
            throw new GenerationNotFoundException("Generation by ID: $id not found");
        }

        return $generationDto;
    }
}
