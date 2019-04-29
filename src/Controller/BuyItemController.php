<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\DeliveryFormType;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use App\Repository\DeliveryRepository;
use Knp\Snappy\Pdf;

class BuyItemController extends AbstractController
{

    /**
     * @Route("/buy/details", name="buy_item_details")
     * @IsGranted("ROLE_USER")
     */
    public function cart()
    {
        $user = $this->getUser();
        return $this->render('buy_item/index.html.twig', [
                'items' => $user->getItems(),
        ]);
    }

    /**
     * @Route("buy/delivery", name="buy_item_delivery")
     * @IsGranted("ROLE_USER")
     */
    public function delivery(EntityManagerInterface $em, Request $request)
    {
        $form = $this->createForm(DeliveryFormType::class);
        $form->handleRequest($request);
        $user = $this->getUser();

        if ($form->isSubmitted() && $form->isValid()) {
            $delivery = $form->getData();
            $delivery->setUser($user);
            $items    = $user->getItems();
            foreach ($items as $item) {
                $delivery->addItem($item);
            }
            $delivery->addItem($form->get('item')->getData());
            $em->persist($delivery);
            $em->flush();
            return $this->redirectToRoute('buy_success', [
                    'id' => $delivery->getId(),
            ]);
        }

        return $this->render('buy_item/delivery.html.twig', [
                'deliveryForm' => $form->createView()
        ]);
    }

    /**
     * @Route("buy/success/{id}", name="buy_success")
     * @IsGranted("ROLE_USER")
     */
    public function success(DeliveryRepository $deliverRepository, EntityManagerInterface $em, $id)
    {
        $delivery = $deliverRepository->find($id);
        $user     = $this->getUser();
        $items    = $user->getItems();
        foreach ($items as $item) {
            $user->removeItem($item);
        }
        $em->persist($user);
        $em->flush();
        return $this->render('buy_item/success.html.twig', [
                'delivery' => $delivery
        ]);
    }

    /**
     * @Route("buy/pdf/{id}", name="generate_pdf")
     * @IsGranted("ROLE_USER")
     */
    public function pdf(Pdf $pdf, DeliveryRepository $deliverRepository, $id)
    {
        $delivery = $deliverRepository->find($id);

        $sum = 0;
        foreach ($delivery->getItems() as $item) {
            $sum += $item->getPrice();
        }

        $html = $this->renderView('buy_item/invoice.html.twig', [
            'delivery' => $delivery,
            'sum'      => $sum,
        ]);

        return new PdfResponse(
            $pdf->getOutputFromHtml($html),
            'invoice.pdf'
        );
    }
}
