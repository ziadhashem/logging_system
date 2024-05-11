<?php

namespace App\Controller;

use App\Entity\EventLog;
use App\Form\EventLogType;
use App\Repository\EventLogRepository;
use App\Service\EventLogService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class EventLogController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard",  methods={"GET"})
     * @Route("/event/log/", name="event_log_index_", methods={"GET"})
     * @Route("/", name="event_log_index", methods={"GET"})
     */
    public function index(EventLogRepository $eventLogRepository): Response
    {

//        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->render('event_log/index.html.twig', [
            'logs' => $eventLogRepository->findAll(),
        ]);
    }

    /**
     * @Route("/event/log/new", name="event_log_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EventLogRepository $eventLogRepository): Response
    {
        $eventLog = new EventLog();
        $form = $this->createForm(EventLogType::class, $eventLog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $eventLogRepository->add($eventLog, true);

            return $this->redirectToRoute('event_log_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('event_log/new.html.twig', [
            'event_log' => $eventLog,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/event/log/{id}", name="event_log_show", methods={"GET"})
     */
    public function show(EventLog $eventLog): Response
    {
        return $this->render('event_log/show.html.twig', [
            'event_log' => $eventLog,
        ]);
    }

    /**
     * @Route("/event/log/{id}/edit", name="event_log_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, EventLog $eventLog, EventLogRepository $eventLogRepository): Response
    {
        $form = $this->createForm(EventLogType::class, $eventLog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $eventLogRepository->add($eventLog, true);

            return $this->redirectToRoute('event_log_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('event_log/edit.html.twig', [
            'event_log' => $eventLog,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/event/log/{id}", name="event_log_delete", methods={"POST"})
     */
    public function delete(Request $request, EventLog $eventLog, EventLogRepository $eventLogRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$eventLog->getId(), $request->request->get('_token'))) {
            $eventLogRepository->remove($eventLog, true);
        }
        return $this->redirectToRoute('event_log_index', [], Response::HTTP_SEE_OTHER);
    }
}
