<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdministratorPanelController extends AbstractController
{
    /**
     * @Route("/admin/panel", name="administrator_panel")
     */
    public function index()
    {
        return $this->render('administrator_panel/index.html.twig', [
            'controller_name' => 'AdministratorPanelController',
        ]);
    }
}
