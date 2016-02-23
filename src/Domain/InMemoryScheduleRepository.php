<?php
namespace examplecon;

class InMemoryScheduleRepository implements ScheduleRepository
{
    /**
     * @var Schedule[]
     */
    private $schedules = [];

    /**
     * @return Schedule
     */
    public function createSchedule()
    {
        $id = new ScheduleId(new Uuid);

        $schedule = new Schedule($id);

        $this->schedules[] = $schedule;

        return $schedule;
    }

    public function commit()
    {
    }

    public function findById(ScheduleId $id)
    {
        foreach ($this->schedules as $schedule) {
            if ($schedule->id()->equals($id)) {
                return $schedule;
            }
        }

        throw new ScheduleNotFoundException;
    }
}