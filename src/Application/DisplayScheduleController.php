<?php
namespace examplecon\application;

use examplecon\presentation\Schedule;
use examplecon\presentation\SchedulePage;
use examplecon\presentation\Talk;

class DisplayScheduleController
{
    /**
     * @var SchedulePage
     */
    private $schedulePage;

    /**
     * @param SchedulePage $schedulePage
     */
    public function __construct(SchedulePage $schedulePage)
    {
        $this->schedulePage = $schedulePage;
    }

    public function execute()
    {
        $schedule = new Schedule(
            'Sebastian\'s Little Schedule',
            [
                new Talk(
                    'Foo',
                    'Room 23',
                    new \DateTimeImmutable('2016-02-24 09:00:00'),
                    new \DateTimeImmutable('2016-02-24 09:45:00')
                ),
                new Talk(
                    'Bar',
                    'Room 42',
                    new \DateTimeImmutable('2016-02-24 10:00:00'),
                    new \DateTimeImmutable('2016-02-24 10:45:00')
                )
            ]
        );

        return $this->schedulePage->render($schedule);
    }

}
