<?php

namespace App\Controller;

use App\Entity\Item;
use Symfony\Bundle\FrameworkBundle\Tests\Fixtures\Validation\Article;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Form\ProductFormType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Repository\ItemRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ItemController extends Controller
{

    /**
     * @Route("/", name="item_list")
     * @Method({"GET"});
     */
    public function index()
    {
        $items = $this->getDoctrine()->getRepository(Item::class)
            ->findAllVisible();

        return $this->render('items/index.html.twig', array(
                'items'    => $items,
                'category' => null
        ));
    }

    /**
     * @Route("/category/{category}", name="item_category_list")
     * @Method({"GET"});
     */
    public function category($category)
    {

        $items = $this->getDoctrine()->getRepository(Item::class)
            ->findByCategory($category);

        return $this->render('items/index.html.twig', array(
                'items'    => $items,
                'category' => $category
        ));
    }
    
    /**
     * @Route("/search", name="item_search_list")
     * @Method({"GET"});
     */
    public function search(Request $request)
    {
        $query = $request->query->get('query');
        $items = $this->getDoctrine()->getRepository(Item::class)
            ->findAllMatching($query);

        return $this->render('items/index.html.twig', array(
                'items'    => $items,
                'category' => $query
        ));
    }


    /**
     * @Route("/items/{id}", name="item_show")
     */
    public function showItem($id)
    {
        $item = $this->getDoctrine()->getRepository(Item::class)
            ->find($id);

        return $this->render('items/show.html.twig', array(
                'item' => $item
        ));
    }

    /**
     * @Route("items/{id}/add-to-cart", name="item_add_to_cart", methods={"POST"})
     * @IsGranted("ROLE_USER")
     */
    public function addToCart(Item $item, EntityManagerInterface $em)
    {
        $user = $this->getUser();
        $item->addUser($user);
        $em->persist($item);
        $em->flush();

        return $this->json($user->getItems(), 200, [], [
            'groups' => ['autocomplete'],
        ]);;
    }

    /**
     * @Route("items/{id}/delete-from-cart", name="item_delete_from_cart", methods={"POST"})
     * @IsGranted("ROLE_USER")
     */
    public function deleteFromCart(Item $item, EntityManagerInterface $em)
    {
        $user = $this->getUser();
        $item->removeUser($user);
        $em->persist($item);
        $em->flush();

       return $this->json($user->getItems(), 200, [], [
            'groups' => ['autocomplete'],
        ]);
    }

    /**
     * @Route("items/api/get", methods="GET", name="items_api")
     */
    public function getItemsApi(ItemRepository $itemRepository, Request $request)
    {
        $items = $itemRepository->findAllMatching($request->query->get('query'));
        return $this->json($items, 200, [], [
            'groups' => ['autocomplete'],
        ]);
    }
}
