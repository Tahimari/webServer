<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\ItemRepository;
use App\Entity\Item;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;

class AccountController extends AbstractController
{

    /**
     * @Route("/account", name="app_account")
     */
    public function index(Request $request, EntityManagerInterface $em, AuthorizationCheckerInterface $authChecker, \App\Repository\UserRepository $ur)
    {
        $user    = $this->getUser();
        $session = new Session();
        if ($request->getMethod() === 'POST') {
            $content = $request->getContent();
            if ($content == 'optradio=dark') {
                $user->setDarkTheme(true);
                $session->set('DARK_THEME', 'TRUE');
            } else {
                $user->setDarkTheme(false);
                $session->remove('DARK_THEME');
            }
            $em->persist($user);
            $em->flush();

            $session = new Session();
            $session->set('darkTheme', 'TRUE');
        }
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
