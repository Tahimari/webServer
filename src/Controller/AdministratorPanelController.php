<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\ProductFormType;
use App\Repository\ItemRepository;
use App\Entity\Item;
use Gedmo\Sluggable\Util\Urlizer;

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
            /** @var UploadedFile $uploadedFile */
            $uploadedFile = $form['file']->getData();

            $item = $form->getData();

            if ($uploadedFile) {
                $destination = $this->getParameter('kernel.project_dir') . '/public/images/shop/';

                $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename      = Urlizer::urlize($originalFilename) . '-' . uniqid() . '.' . $uploadedFile->guessExtension();

                $uploadedFile->move(
                    $destination,
                    $newFilename
                );


                $item->setImageUrl('/images/shop/' . $newFilename);
            }

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
            /** @var UploadedFile $uploadedFile */
            $uploadedFile = $form['file']->getData();

            $item = $form->getData();

            if ($uploadedFile) {
                $destination = $this->getParameter('kernel.project_dir') . '/public/images/shop/';

                $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename      = Urlizer::urlize($originalFilename) . '-' . uniqid() . '.' . $uploadedFile->guessExtension();

                $uploadedFile->move(
                    $destination,
                    $newFilename
                );


                $item->setImageUrl('/images/shop/' . $newFilename);
            }

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
    public function list(Request $request, ItemRepository $repository, PaginatorInterface $paginator)
    {
        $q            = $request->query->get('q');
        $queryBuilder = $repository->findAll();
        $pagination   = $paginator->paginate(
            $queryBuilder,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('administrator_panel/list.html.twig', [
                'products' => $pagination,
        ]);
    }
}
