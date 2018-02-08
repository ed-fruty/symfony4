<?php
declare(strict_types=1);
namespace App\Http\Actions;

use League\Tactician\CommandBus;
use Symfony\Component\HttpFoundation\Request;

class CreateNodeAction
{
    private $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function __invoke(Request $request, CreateNodeResponder $responder)
    {
        $this->commandBus->handle(new CreateNodeCommand(
            $uuid = Uuid::uuid4(), 
            $request->get('name')
        ));

        return $responder->toResponse($uuid);
    }
}