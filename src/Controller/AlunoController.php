<?php

namespace App\Controller;

use App\Entity\Aluno;
use App\Form\AlunoType;
use JMS\Serializer\SerializerBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class StudentController
 * @package App\Controller
 * @Route("/student")
 */
class AlunoController extends AbstractController
{
    /**
     * @param Request $request
     * @param null $id
     * @return Response
     * @Route("/{id}", name="student_get", methods={"GET"})
     */
    public function getAction(Request $request, $id = null)
    {
        // $data = $request->request->all(); // pega todos os dados que vierem da request. Aqui no caso eu trato pelo $id.

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
     * @Route("", name="student_save", methods={"POST"})
     */
    public function postAction(Request $request)
    {
        $data = $request->request->all();

        $aluno = new Aluno();

        $form = $this->createForm(AlunoType::class, $aluno);

        $form->submit($data);

        // Forma antiga de fazer as requests
        // $aluno->setName($data['name']);
        // $aluno->setCpf($data['cpf']);
        // $aluno->setAddress($data['address']);
        // $aluno->setCep($data['cep']);
        // $aluno->setEmail($data['email']);
        // $aluno->setPhoneNumber($data['phone_number']);
        // $aluno->setCourseCollection($data['course-collection']);
        // $aluno->setCreatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));
        // $aluno->setUpdatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));

        $doctrine = $this->getDoctrine()->getManager();

        $doctrine->persist($aluno);

        $doctrine->flush();

        return new JsonResponse(['msg' => 'Aluno inserido com sucesso!'], 200);
    }

    /**
     * @param Request $request
     * @return JsonResponse|\Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @throws \Exception
     * @Route("", name="student_update", methods={"PUT"})
     */
    public function putAction(Request $request)
    {
        $data = $request->request->all();

        $aluno = $this->getDoctrine()->getRepository('App\Entity\Aluno')->find($data['id']);

        $form = $this->createForm(AlunoType::class, $aluno);

        $form->submit($data);

        // $aluno->setCpf($data['cpf']);
        // $aluno->setAddress($data['address']);
        // $aluno->setCep($data['cep']);
        // $aluno->setEmail($data['email']);
        // $aluno->setPhoneNumber($data['phone_number']);
        // $aluno->setUpdatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));

        if (!$aluno) {
            return $this->createNotFoundException('Aluno Not Found!');
        }

        $doctrine = $this->getDoctrine()->getManager();

        $doctrine->merge($aluno);

        $doctrine->flush();

        return new JsonResponse(["message" => "Aluno atualizado com sucesso."], 200);
    }

    /**
     * @param Aluno $aluno
     * @return JsonResponse
     * @Route("/{id}", name="student_delete", methods={"DELETE"})
     */
    public function deleteAction(Aluno $aluno)
    {
        $doctrine = $this->getDoctrine()->getManager();
        $doctrine->remove($aluno);
        $doctrine->flush();
        return new JsonResponse(['message' => 'Aluno Removido com Sucesso!'], 200);
    }
}
