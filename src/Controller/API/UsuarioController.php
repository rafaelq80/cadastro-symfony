<?php

namespace App\Controller\API;

use App\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1", name="api_v1_usuario_")
 */


class UsuarioController extends AbstractController
{

    /**
     * @Route("/lista", methods={"GET"}, name="lista")
     */

    public function lista(): JsonResponse
    {

        $doctrine = $this->getDoctrine()->getRepository(Usuario::class);

        return new JsonResponse($doctrine->pegarTodos(), 200);
    }

    /**
     * @Route("/cadastra", methods={"POST"}, name="cadastra")
     */

    public function cadastra(Request $request): Response
    {

        $usuario = new Usuario();

        $usuario->setNome($request->query->get('nome'));
        $usuario->setEmail($request->query->get('email'));

        $doctrine = $this->getDoctrine()->getManager();

        $doctrine->persist($usuario);

        $doctrine->flush();

        if ($doctrine->contains($usuario)) {

            return new Response("OK!", 200);
        } else {

            return new Response("error", 404);
        }

        // return new Response("error", 404);
    }
}