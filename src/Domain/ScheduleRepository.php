<?php
namespace examplecon;

interface ScheduleRepository
{
    /**
     * @return Schedule
     */
    public function createSchedule();

    /**
     * @throws ScheduleRepositoryException
     */
    public function commit();

    /**
     * @param ScheduleId $id
     *
     * @return Schedule
     *
     * @throws ScheduleRepositoryException
     */
    public function findById(ScheduleId $id);
}