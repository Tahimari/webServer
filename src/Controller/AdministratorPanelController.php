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
     * @Route("/admin/items/new", name="admin_item_new")
     * @IsGranted("ROLE_ADMIN")
     */
    public function newItem(EntityManagerInterface $em, Request $request)
    {
        $form = $this->createForm(ProductFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $item = $form->getData();

            $em->persist($item);
            $em->flush();

            $this->addFlash('success', 'Product added!');

            return $this->redirectToRoute('admin_item_list');
        }

        return $this->render('administrator_panel/new.html.twig', [
                'productForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/items/{id}/edit", name="admin_item_edit")
     * @IsGranted("ROLE_ADMIN")
     */
    public function editItem(Item $item, Request $request, EntityManagerInterface $em)
    {
        $form = $this->createForm(ProductFormType::class, $item);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $item = $form->getData();

            $em->persist($item);
            $em->flush();

            $this->addFlash('success', 'Product Updated!');

            return $this->redirectToRoute('admin_item_edit', [
                    'id' => $item->getId(),
            ]);
        }

        return $this->render('administrator_panel/edit.html.twig', [
                'productForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/items/{id}/delete", name="admin_item_delete")
     * @IsGranted("ROLE_ADMIN")
     */
    public function delete(Item $item, EntityManagerInterface $em)
    {
        $em->remove($item);
        $em->flush();

        $this->addFlash('warning', 'Product Deleted!');

        return $this->redirectToRoute('admin_item_list');
    }

    /**
     * @Route("/admin/items/list", name="admin_item_list")
     * @IsGranted("ROLE_ADMIN")
     */
    public function list(ItemRepository $itemRepository)
    {
        $items = $itemRepository->findAll();

        return $this->render('administrator_panel/list.html.twig', [
                'products' => $items,
        ]);
    }
}
