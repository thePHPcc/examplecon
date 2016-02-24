<?php
namespace examplecon\application;

use examplecon\ScheduleId;
use examplecon\ScheduleRepository;
use examplecon\Talk;
use examplecon\TimeSlot;
use examplecon\Uuid;

class SelectTalkCommand
{
    /**
     * @var ScheduleRepository
     */
    private $scheduleRepository;

    /**
     * @param ScheduleRepository $scheduleRepository
     */
    public function __construct(ScheduleRepository $scheduleRepository)
    {
        $this->scheduleRepository = $scheduleRepository;
    }

    public function execute($id, $timeSlot)
    {
        $schedule = $this->scheduleRepository->findById(
            new ScheduleId(new Uuid($id))
        );

        $schedule->add(
            new Talk(new TimeSlot($timeSlot))
        );

        $this->scheduleRepository->commit();
    }
}