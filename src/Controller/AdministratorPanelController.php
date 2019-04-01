<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\ProductFormType;
use App\Repository\ItemRepository;
use App\Entity\Item;

class AdministratorPanelController extends AbstractController
{

    /**
     * @Route("/admin/list", name="administrator_panel")
     */
    public function index()
    {
        return $this->render('administrator_panel/index.html.twig', [
                'controller_name' => 'AdministratorPanelController',
        ]);
    }

    /**
     * @Route("/admin/items/new", name="item_new")
     * @IsGranted("ROLE_ADMIN_ARTICLE")
     */
    public function newItem(EntityManagerInterface $em, Request $request)
    {
        $form = $this->createForm(ProductFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $product = $form->getData();

            $em->persist($article);
            $em->flush();

            $this > addFlash('success', 'Product added!');

            return $this->redirectToRoute('administrator_panel');
        }

        return $this->render('administrator_panel/new.html.twig', [
                'productForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/items/{id}/edit", name="item_edit")
     * @IsGranted("MANAGE", subject="item")
     */
    public function editItem(Item $product, Request $request, EntityManagerInterface $em)
    {
        $form = $this->createForm(ProductFormType::class, $product);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $product = $form->getData();

            $em->persist($product);
            $em->flush();

            $this->addFlash('success', 'Product Updated!');

            return $this->redirectToRoute('item_edit', [
                    'id' => $product->getId(),
            ]);
        }

        return $this->render('administrator_panel/edit.html.twig', [
                'productForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/items/list", name="admin_item_list")
     */
    public function list(ItemRepository $itemRepository)
    {
        $products = $itemRepository->findAll();

        return $this->render('administrator_panel/list.html.twig', [
                'products' => $products,
        ]);
    }
}
