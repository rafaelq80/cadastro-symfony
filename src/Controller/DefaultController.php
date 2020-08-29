<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController
{

    /* Após instalar o Annotations, a criação de rotas utiliza a estrutura abaixo */

    /*public function index(Request $request): Response
    {

        //return new Response("Digital", 200);

        $resp = new Response();
        $resp->setContent(json_encode(
            [

                "recebido" => $request->get('nome'),
                "ip" => $request->getClientIp()

            ]
        ));

        $resp->setStatusCode(200);

        return $resp;
    }*/
}