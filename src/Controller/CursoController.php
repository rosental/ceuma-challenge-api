<?php

namespace App\Controller;

use App\Entity\Curso;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use JMS\Serializer\SerializerBuilder;

/**
 * Class CursoController
 * @package App\Controller
 * @Route("/curso")
 */
class CursoController extends AbstractController
{
    /**
     * @param Request $request
     * @param null $id
     * @return Response
     * @Route("/{id}", methods={"GET"}, name="curso_get")
     */
    public function getAction(Request $request, $id = null)
    {
        $data = $request->request->all();
        $courseData = $this->getDoctrine()->getRepository('App\Entity\Course');
        if (is_null($id)) {
            $courseData = $courseData->findAll($data);
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
     * @Route("", methods={"POST"}, name="curso_post")
     */
    public function postAction(Request $request)
    {
        $data = $request->request->all();
        $doctrine = $this->getDoctrine()->getManager();
        $course = new Curso();
        $course->setNome($data['nome']);
        $course->setCargaHoraria($data['carga_horaria']);
        $course->setCreatedAt(new DateTime("now", new \DateTimeZone("America/Sao_Paulo")));
        $course->setUpdatedAt(new DateTime("now", new \DateTimeZone("America/Sao_Paulo")));
        $doctrine->persist($course);
        $doctrine->flush();
        return new JsonResponse(['msg' => 'Curso inserido com sucesso!'], 200);
    }

    /**
     * @param Request $request
     * @return JsonResponse|\Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @throws \Exception
     * @Route("", methods={"PUT"}, name="curso_put")
     */
    public function putAction(Request $request)
    {
        $data = $request->request->all();
        $course = $this->getDoctrine()->getRepository('App\Entity\Course')->find($data['id']);
        $course->setName($data['name']);
        $course->setWorkload($data['workload']);
        $course->setUpdatedAt(new DateTime("now", new \DateTimeZone("America/Sao_Paulo")));
        if (!$course) {
            return $this->createNotFoundException('User Not Found!');
        }
        $doctrine = $this->getDoctrine()->getManager();
        $doctrine->merge($course);
        $doctrine->flush();
        return new JsonResponse(["message" => "Usuario atualizado com sucesso."], 200);
    }

    /**
     * @param Curso $curso
     * @return JsonResponse
     * @Route("/{id}", methods={"DELETE"}, name="curso_delete")
     */
    public function deleteAction(Curso $curso)
    {
        $doctrine = $this->getDoctrine()->getManager();
        $doctrine->remove($curso);
        $doctrine->flush();
        return new JsonResponse(['message' => 'Usuario Removido com Sucesso!'], 200);
    }
}
