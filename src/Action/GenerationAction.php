<?php

declare(strict_types=1);

namespace App\Action;

use Pecee\Http\Response;
use App\UseCase\CreateGenerationUseCase;

class GenerationAction extends AbstractAction
{
    public function __construct(private CreateGenerationUseCase $createGenerationUseCase)
    {
    }

    public function action(): Response
    {
        return $this->respond($this->createGenerationUseCase->execute());
    }
}
