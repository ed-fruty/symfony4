<?php

namespace App\Repository;

use App\Entity\Node;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Ramsey\Uuid\UuidInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;

class NodeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Node::class);
    }


    public function persist(Node $node, array $options = []): bool
    {
        $this->_em->persist($node);

        return true;
    }

    public function newInstance(UuidInterface $uuid): Node
    {
        return new Node($uuid);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('n')
            ->where('n.something = :value')->setParameter('value', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
