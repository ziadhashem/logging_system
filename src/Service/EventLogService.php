<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 5/8/2024
 * Time: 2:41 PM
 */

namespace App\Service;

use App\Entity\EventLog;
use Doctrine\ORM\EntityManagerInterface;

class EventLogService
{

    private $em;

    /**
     * EventLogService constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }


    /**
     * @param EventLog $eventLog
     * @return array
     */
    Public Function Logging(EventLog $eventLog){
        $result = [];
        try {
            $eventLogRepository = $this->em->getRepository(EventLog::class);
            $eventLogRepository->add($eventLog, true);
            $result["msg"] =  "The event was registered successfully";
            $result["is_error"] = true;
        }catch (\Exception $exception){
            $result["msg"] =  $exception->getMessage();
            $result["is_error"] = true;
        }
        return $result;
    }


    public function fofo(){
        dd("fofo");
    }
}