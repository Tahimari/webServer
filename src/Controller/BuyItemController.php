<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BuyItemController extends AbstractController
{
    /**
     * @Route("/buy/details/", name="buy_item_details")
     */
    public function addToCart()
    {
        $user = $this->getUser();
        return $this->render('buy_item/index.html.twig', [
            'items' => $user->getItems(),
        ]);
    }

    /**
     * @Route("buy/delivery/", name="buy_item_delivery")
     */
    public function delivery()
    {
        return $this->render('buy_item/delivery.html.twig');
    }

}
