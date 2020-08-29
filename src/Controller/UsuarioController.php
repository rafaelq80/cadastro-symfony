<?php

namespace App\Controller;

use App\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/", name="web_usuario_")
 */
class UsuarioController extends AbstractController
{
    /**
     * @Route("/", methods={"GET"}, name="index")
     */
    public function index(): Response
    {
        /*return new Response("Implementar Cadastro");
        return $this->render("usuario/erro.html.twig", [
            'fulano' => "Rafael"
        ]);*/

        return $this->render('usuario/form.html.twig');
        //return new Response('Implementar Gravação no BD');
    }

    /**
     * @Route("/salvar", methods={"POST"}, name="salvar")
     */
    public function salvar(Request $request): Response
    {
        //dump($request->request->all());

        $data = $request->request->all();

        $usuario = new Usuario();

        $usuario->setNome($data['nome']);
        $usuario->setEmail($data['email']);

        //dump($usuario);

        $doctrine = $this->getDoctrine()->getManager();

        $doctrine->persist($usuario);

        $doctrine->flush();

        //dump($usuario);

        //if ($usuario->getId()) { //Método 01 de confirmar a Gravação no BD

        if ($doctrine->contains($usuario)) { //Método 02 de confirmar a Gravação no BD

            return $this->render('usuario/sucesso.html.twig', [
                'fulano' => $data['nome'],
            ]);
        } else {

            return $this->render('usuario/erro.html.twig', [
                'fulano' => $data['nome'],
            ]);
        }

        // return new Response('Implementar Gravação no BD');
    }
}