<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Entity\Message;
use Doctrine\ORM\EntityManager;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    protected EntityManager $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }


    public function indexAction()
    {
        $item = $this->em->getRepository(Message::class)->find(1);
        $item->setText(rand(1, 1000));
        $this->em->persist($item);
        $this->em->flush();

        $data = $this->em->getRepository(Message::class)->findAll();
        return new ViewModel(['list' => $data]);
    }
}
