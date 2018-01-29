<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NodeRepository")
 */
class Node
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid")
     */
    private $id;

    /**
     * Node name.
     * 
     * @var string
     * 
     * @ORM\Column(type="string", name="name", nullable=false, length=255)
     */
    private $name;

    /**
     * node constructor.
     * 
     * @param Uuid $id 
     */
    public function __construct(Uuid $id)
    {
    	$this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
