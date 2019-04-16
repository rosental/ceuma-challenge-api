<?php

namespace App\Controller;

use App\Entity\Aluno;
use JMS\Serializer\SerializerBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Tests\Fixtures\AnnotationFixtures\AbstractClassController;

/**
 * Class AlunoController
 * @package App\Controller
 * @Route("/aluno", name="aluno")
 */

class AlunoController extends AbstractClassController
{
    /**
     * @param Response $request
     * @param null $id
     * @return Response
     * @Route("/{id}", methods={"GET"}, name="aluno_get")
     */
    public function getAction(Request $request, $id = null)
    {
        $alunoData = $this->getDoctrine()->getRepository('App\Entity\Aluno');
        if (is_null($id)) {
            $alunoData = $alunoData->findAll();
        } else {
            $id = (int) $id;
            $alunoData = $alunoData->find($id);
        }
        $aluno = SerializerBuilder::create()->build()->serialize($alunoData, 'json');
        return new Response($aluno, 200, ['Content-Type' => 'application/json']);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     * @Route("", methods={"POST"}, name="aluno_post")
     */
    public function postAction(Request $request)
    {
        $data = $request->request->all();

        $doctrine = $this->getDoctrine()->getManager();

        $aluno = new Aluno();
        $aluno->setNome($data['nome']);
        $aluno->setCpf($data['cpf'])
              ->setCep($data['cep'])
              ->setEmail($data['email'])
              ->setEndereco($data['endereco'])
              ->setTelefone($data['telefone']);

        $doctrine->persist($aluno);
        $doctrine->flush();

        return new JsonResponse(['msg' => 'Aluno inserido com sucesso!'], 200);
    }

    /**
     * @param Request $request
     * @return JsonResponse|\Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * * @Route("", methods={"PUT"}, name="aluno_put")
     */
    public function putAction(Request $request)
    {
        $data = $request->request->all();
        $aluno = $this->getDoctrine()->getRepository('App\Entity\Aluno')->find($data['id']);
        $aluno->setNome($data['nome'])
              ->setCpf($data['cpf'])
              ->setEmail($data['email'])
              ->setCep($data['cpf'])
              ->setEndereco($data['endereco'])
              ->setTelefone($data['telefone']);
        if (!$aluno) {
            return $this->createNotFoundException('Aluno Not Found!');
        }

        $doctrine = $this->getDoctrine()->getManager();
        $doctrine->merge($aluno);
        $doctrine->flush();

        return new JsonResponse(["message" => "Aluno atualizado com sucesso."], 200);
    }

    /**
     * @param Curso $aluno
     * @return JsonResponse
     * @Route("/{id}", methods={"DELETE"}, name="aluno_delete")
     */
    public function deleteAction(Aluno $aluno)
    {
        $doctrine = $this->getDoctrine()->getManager();
        $doctrine->remove($aluno);
        $doctrine->flush();
        return new JsonResponse(['message' => 'Aluno Removido com Sucesso!'], 200);
    }
}
