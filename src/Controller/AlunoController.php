<?php

namespace App\Controller;

use App\Entity\Aluno;
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
//        // $data = $request->request->all();
//        $studentData = $this->getDoctrine()->getRepository('App\Entity\Student');
//        if (is_null($id)) {
//            $studentData = $studentData->findAll();
//        } else {
//            $id = (int) $id;
//            $studentData = $studentData->find($id);
//        }
//        $student = SerializerBuilder::create()->build()->serialize($studentData, 'json');
//        return new Response($student, 200, ['Content-Type' => 'application/json']);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     * @Route("", name="student_save", methods={"POST"})
     */
    public function postAction(Request $request)
    {
//        $data = $request->request->all();
//        $student = new Student();
//        $form = $this->createForm(StudentType::class, $student);
//        $form->submit($data);
//        // $student->setName($data['name']);
//        // $student->setCpf($data['cpf']);
//        // $student->setAddress($data['address']);
//        // $student->setCep($data['cep']);
//        // $student->setEmail($data['email']);
//        // $student->setPhoneNumber($data['phone_number']);
//        // $student->setCourseCollection($data['course-collection']);
//        // $student->setCreatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));
//        // $student->setUpdatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));
//        $doctrine = $this->getDoctrine()->getManager();
//        $doctrine->persist($student);
//        $doctrine->flush();
//        return new JsonResponse(['msg' => 'Aluno inserido com sucesso!'], 200);
    }

    /**
     * @param Request $request
     * @return JsonResponse|\Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @throws \Exception
     * @Route("", name="student_update", methods={"PUT"})
     */
    public function putAction(Request $request)
    {
//        $data = $request->request->all();
//        $student = $this->getDoctrine()->getRepository('App\Entity\Student')->find($data['id']);
//        $form = $this->createForm(StudentType::class, $student);
//        $form->submit($data);
//        // $student->setCpf($data['cpf']);
//        // $student->setAddress($data['address']);
//        // $student->setCep($data['cep']);
//        // $student->setEmail($data['email']);
//        // $student->setPhoneNumber($data['phone_number']);
//        // $student->setUpdatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));
//        if (!$student) {
//            return $this->createNotFoundException('Student Not Found!');
//        }
//        $doctrine = $this->getDoctrine()->getManager();
//        $doctrine->merge($student);
//        $doctrine->flush();
//        return new JsonResponse(["message" => "Aluno atualizado com sucesso."], 200);
    }

    /**
     * @param Student $student
     * @return JsonResponse
     * @Route("/{id}", name="student_delete", methods={"DELETE"})
     */
    public function deleteAction(Aluno $aluno)
    {
//        $doctrine = $this->getDoctrine()->getManager();
//        $doctrine->remove($student);
//        $doctrine->flush();
//        return new JsonResponse(['message' => 'Aluno Removido com Sucesso!'], 200);
    }
}
