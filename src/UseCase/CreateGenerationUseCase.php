<?php

declare(strict_types=1);

namespace App\UseCase;

use App\Dto\GenerationDto;
use App\Repository\GenerationSessionRepository;

class CreateGenerationUseCase
{
    public function __construct(private readonly GenerationSessionRepository $generationSessionRepository)
    {
    }

    public function execute(): GenerationDto
    {
        return $this->generationSessionRepository->generate();
    }
}
