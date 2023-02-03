<?php

declare(strict_types=1);

namespace App\Action;

use App\UseCase\GetGenerationUseCase;
use Pecee\Http\Response;

class GetGenerationAction extends AbstractAction
{
    public function __construct(private readonly GetGenerationUseCase $getCodeUseCase)
    {
    }

    public function action(int $id): Response
    {
        return $this->respond($this->getCodeUseCase->execute($id));
    }
}
