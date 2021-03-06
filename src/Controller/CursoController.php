<?php

namespace App\Controller;

use App\Entity\Curso;
use App\Form\CursoType;
use JMS\Serializer\SerializerBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/courses")
 */
class CursoController extends AbstractController
{
    /**
     * @Route("/{id}", name="course_get", methods={"GET"})
     * @param Request $request
     * @param null $id
     * @return Response
     */
    public function getAction(Request $request, $id = null)
    {
        // $data = $request->request->all();

        $courseData = $this->getDoctrine()->getRepository('App\Entity\Curso');

        if (is_null($id)) {
            $courseData = $courseData->findAll();
        } else {
            $id = (int) $id;
            $courseData = $courseData->find($id);
        }

        $course = SerializerBuilder::create()->build()->serialize($courseData, 'json');

        return new Response($course, 200, ['Content-Type' => 'application/json']);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     * @Route("", name="course_save", methods={"POST"})
     */
    public function postAction(Request $request)
    {
        $data = $request->request->all();

        $course = new Curso();

        // Adicionando Formulario para insercao
        $form = $this->createForm(CursoType::class, $course);
        $form->submit($data);

        if (!$form->isValid()) { // isValid pertence ao FormValidation e já tras consigo utilitarios para validacao
            return new JsonResponse( (string) $form->getErrors(true, false), 200);
        }

        // $course->setName($data['name']);
        // $course->setWorkload($data['workload']);
        // $course->setStudentCollection($data['student-collection']);
        // $course->setCreatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));
        // $course->setUpdatedAt(new \DateTime("now", new \DateTimeZone("America/Sao_Paulo")));

        $doctrine = $this->getDoctrine()->getManager();
        $doctrine->persist($course); //prepare
        $doctrine->flush(); // insert

        return new JsonResponse(['msg' => 'Curso inserido com sucesso!'], 200);
    }

    /**
     * @param Request $request
     * @return JsonResponse|\Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @Route("", name="course_update", methods={"PUT"})
     * @throws \Exception
     */
    public function putAction(Request $request)
    {
        $data = $request->request->all();

        $course = $this->getDoctrine()->getRepository('App\Entity\Curso')->find($data['id']);

        if (!$course) {
            return $this->createNotFoundException('Curso Not Found!');
        }

        $form = $this->createForm(CursoType::class, $course);
        $form->submit($data);

        if (!$form->isValid()) { // isValid pertence ao FormValidation e já tras consigo utilitarios para validacao
            return new JsonResponse( (string) $form->getErrors(true, false), 200);
        }

        $doctrine = $this->getDoctrine()->getManager();
        $doctrine->merge($course);
        $doctrine->flush();

        return new JsonResponse(["message" => "Curso atualizado com sucesso."], 200);
    }

    /**
     * @param Curso $curso
     * @return JsonResponse
     * @Route("/{id}", name="course_delete", methods={"DELETE"})
     */
    public function deleteAction(Curso $curso)
    {
        $doctrine = $this->getDoctrine()->getManager();
        $doctrine->remove($curso);
        $doctrine->flush();
        return new JsonResponse(['message' => 'Curso Removido com Sucesso!'], 200);
    }
}
