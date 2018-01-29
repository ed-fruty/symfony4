<?php
declare(strict_types=1);
namespace App\Events;

use App\Entity\Node;
use Symfony\Component\EventDispatcher\Event;

final class NodeWasCreatedEvent extends Event
{

	/**
	 * Node instance.
	 * 
	 * @var Node
	 */
	private $node;

	/**
	 * Event constructor.
	 * 
	 * @param Node $node 
	 */
	public function __construct(Node $node)
	{
		$this->node = $node;
	}

    /**
     * @return Node
     */
    public function getNode()
    {
        return $this->node;
    }
}
