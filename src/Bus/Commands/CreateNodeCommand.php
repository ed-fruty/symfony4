<?php
declare(strict_types=1);
namespace App\Bus\Commands;

use Ramsey\Uuid\Uuid;

final class CreateNodeCommand
{
	/**
	 * Node id.
	 * 
	 * @var Uuid
	 */
	private $id;

	/**
	 * Node name.
	 * 
	 * @var string
	 */
	private $name;

	/**
	 * Command constructor.
	 * 
	 * @param Uuid   $id   
	 * @param string $name 
	 */
	public function __construct(Uuid $id, string $name)
	{
		$this->id = $id;
		$this->name = $name;
	}


    /**
     * @return Uuid
     */
    public function getId(): Uuid
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
