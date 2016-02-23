<?php
namespace examplecon;

class SimpleScheduleRepository implements ScheduleRepository
{
    /**
     * @var string
     */
    private $dataDirectory;

    /**
     * @var InMemoryScheduleRepository
     */
    private $repository;

    /**
     * @var Schedule[]
     */
    private $schedules = [];

    /**
     * @param string                     $dataDirectory
     * @param InMemoryScheduleRepository $repository
     */
    public function __construct($dataDirectory, InMemoryScheduleRepository $repository)
    {
        $this->dataDirectory = $dataDirectory;
        $this->repository    = $repository;
    }

    public function createSchedule()
    {
        $schedule = $this->repository->createSchedule();

        $this->schedules[] = $schedule;

        return $schedule;
    }

    public function commit()
    {
        foreach ($this->schedules as $schedule) {
            file_put_contents(
                sprintf(
                    '%s/%s',
                    $this->dataDirectory,
                    $schedule->id()
                ),
                serialize($schedule)
            );
        }
    }

    public function findById(ScheduleId $id)
    {
        try {
            return $this->repository->findById($id);
        } catch (ScheduleNotFoundException $e) {
            return $this->load($id);
        }
    }

    private function load(ScheduleId $id)
    {
        $schedule = unserialize(
            @file_get_contents(
                sprintf(
                    '%s/%s',
                    $this->dataDirectory,
                    $id
                )
            )
        );

        if (!$schedule instanceof Schedule) {
            throw new ScheduleNotFoundException;
        }

        return $schedule;
    }
}