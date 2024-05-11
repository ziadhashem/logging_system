<?php

namespace App\EventSubscriber;

use App\Service\EventLogService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\Event\FinishRequestEvent;
use Symfony\Component\HttpKernel\Event\KernelEvent;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\Event\TerminateEvent;

class EventSubscriber implements EventSubscriberInterface
{


    private $eventLogService;

    /**
     * EventSubscriber constructor.
     * @param EventLogService $eventLogService
     */
    public function __construct(EventLogService $eventLogService){
        $this->eventLogService = $eventLogService;
    }

    public function onKernelRequest(RequestEvent $event): void
    {
//        if (!$event->isMainRequest()) {
//            // don't do anything if it's not the main request
//            return;
//        }
        echo "  onKernelRequest \n";
        echo "\r\n";
//         $this->eventLogService->fofo();
    }

    public function onTerminate(TerminateEvent $event)
    {
        $request = $event->getRequest();
        echo "     onTerminate \n";
        echo "\r\n";
//        if ($request->attributes->get('_route') == 'some_route_name') {
//            // do stuff
//        }
    }
    public function onKernelController(ControllerEvent $event)
    {
        $request = $event->getRequest();
        echo "     onKernelController \n";
        echo "\r\n";
//        if ($request->attributes->get('_route') == 'some_route_name') {
//            // do stuff
//        }
    }

    public function onKernelFinishRequest(FinishRequestEvent $event)
    {
        $request = $event->getRequest();
        echo "     onKernelFinishRequest \n";
        echo "\r\n";
//        if ($request->attributes->get('_route') == 'some_route_name') {
//            // do stuff
//        }
    }

    public function onKernelResponse(ResponseEvent $event)
    {
        $request = $event->getRequest();
        echo "     onKernelResponse \n";
        echo "\r\n";
//        if ($request->attributes->get('_route') == 'some_route_name') {
//            // do stuff
//        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
//            'kernel.request'    => 'onKernelRequest',
//            'kernel.controller' => 'onKernelController',
//            'kernel.Finish.Request' => 'onKernelFinishRequest',
//            'kernel.terminate'  => 'onTerminate',
//            'Kernel.response'    => 'onKernelResponse',
        ];
    }


    public function r(){

    }

}
