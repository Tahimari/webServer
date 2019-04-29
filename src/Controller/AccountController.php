<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\ItemRepository;
use App\Entity\Item;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class AccountController extends AbstractController
{

    /**
     * @Route("/account", name="app_account")
     */
    public function index()
    {
        $user = $this->getUser();
        return $this->render('account/index.html.twig', [
                'user' => $user
        ]);
    }

    /**
     * @Route("/account/get-cart", name="app_account_items")
     * @IsGranted("ROLE_USER")
     */
    public function getCart()
    {
        $session = new Session();

        $items = $this->getUser()->getItems();
        $session->set('cart', count($items));

        return $this->json($items, 200, [], [
                'groups' => ['cart'],
        ]);
    }
}
