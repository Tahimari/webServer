<?php
namespace  App\Controller;

use App\Entity\Item;
use Symfony\Bundle\FrameworkBundle\Tests\Fixtures\Validation\Article;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ItemController extends Controller{
    /**
     * @Route("/", name="item_list")
     * @Method({"GET"});
     */
    public function index() {

        $items = $this->getDoctrine()->getRepository(Item::class)
            ->findAll();

        return $this->render('items/index.html.twig', array(
            'items' => $items
        ));
    }

    /**
     * @Route("/items/{id}", name="item_show")
     */
    public function showItem($id) {

        $item = $this->getDoctrine()->getRepository(Item::class)
            ->find($id);

        return $this->render('items/show.html.twig', array(
            'item' => $item
        ));
    }
}