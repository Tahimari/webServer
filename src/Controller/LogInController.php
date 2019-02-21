<?php
namespace  App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LogInController extends Controller{
    /**
     * @Route("/log_in", name="log_in")
     */
    public function logIn() {

        return $this->render('log_in.html.twig');
    }
}