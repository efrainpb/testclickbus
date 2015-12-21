<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig');
    }

    public function billetesAction(Request $request)
    {
        $monto = $request->request->get('monto');
        $b100 = floor($monto/100);
        $monto2 = $monto % 100;
        $b50 = floor($monto2/50);
        $monto3 = $monto2 % 50;
        $b20 = floor($monto3/20);
        $monto4 = $monto3 % 20;
        $b10 = floor($monto4/10);
        $response = array("code" => 200, "b100" => $b100, "b50" => $b50, "b20" => $b20, "b10" => $b10);
        return new Response(json_encode($response));
    }
}
