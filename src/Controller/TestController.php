<?php

namespace App\Controller;

use App\Bus\Commands\CreateNodeCommand;
use App\Entity\Node;
use League\Tactician\CommandBus;
use Ramsey\Uuid\Uuid;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TestController extends Controller
{
    /**
     * @Route("/test", name="test")
     */
    public function index()
    {
    	$node = new Node($id = Uuid::uuid4());
    	//$node->setId();
    	$node->setName('name');

    	$em = $this->getDoctrine()->getEntityManager();

    	$em->persist($node);
    	$em->flush();
		//$em->clear();

		$node2 = $em->find(Node::class, (string) $id);

    	dump($node->getId()->toString(), $node2->getId()->toString(), $node === $node2);


        // replace this line with your own code!
        return $this->render('@Maker/demoPage.html.twig', [ 'path' => str_replace($this->getParameter('kernel.project_dir').'/', '', __FILE__) ]);
    }

    /**
     * @Route("/handle", name="test")
     */
    public function handle(CommandBus $bus)
    {
    	$bus->handle(new CreateNodeCommand(
    		$id = Uuid::uuid4(),
    		'new-node'
    	));

    	$node = $this->getDoctrine()->getEntityManager()->find(Node::class, $id);

    	dump($node->getId()->toString(), $id->toString());
    	exit;
    }
}
