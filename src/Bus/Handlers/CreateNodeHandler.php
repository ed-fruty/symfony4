<?php
declare(strict_types=1);
namespace App\Bus\Handlers;

use App\Events\NodeWasCreatedEvent;
use App\Repository\NodeRepository;
use Symfony\Component\EventDispatcher\EventDispatcher;

final class CreateNodeHandler
{
	/**
	 * @var NodeRepository
	 */
	private $nodeRepository;

	/**
	 * @var EventDispatcher
	 */
	private $eventDispatcher;

	/**
	 * Handler constructor.
	 * 
	 * @param NodeRepository  $nodeRepository  
	 * @param EventDispatcher $eventDispatcher 
	 */
	public function __construct(NodeRepository $nodeRepository, EventDispatcher $eventDispatcher)
	{
		$this->nodeRepository = $nodeRepository;
		$this->eventDispatcher = $eventDispatcher;
	}

	/**
	 * Create node process.
	 * 
	 * @param  CreateNodeCommand $command 
	 * @return void                     
	 */
	public function handle(CreateNodeCommand $command)
	{
		$node = (new Node($command->getId()))
			->setName($command->getName());

		$this->nodeRepository->save($node, false);
		
		$this->eventDispatcher->dispatch(NodeWasCreatedEvent::class, new NodeWasCreatedEvent($node));
	}
}