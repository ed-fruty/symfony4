<?php
declare(strict_types=1);
namespace App\Http\Responders;

use Ramsey\Uuid\UuidInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CreateNodeResponder
{
    public function toResponse(UuidInterface $uuid)
    {
        return new RedirectResponse('/');
    }
}