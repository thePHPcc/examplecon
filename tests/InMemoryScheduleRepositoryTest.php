<?php
namespace examplecon;

class InMemoryScheduleRepositoryTest extends \PHPUnit_Framework_TestCase
{
    public function testScheduleCanBeCreated()
    {
        $repository = new InMemoryScheduleRepository;

        $schedule = $repository->createSchedule();

        $this->assertInstanceOf(Schedule::class, $schedule);
    }

    public function testScheduleCanBeFound()
    {
        $repository = new InMemoryScheduleRepository;

        $schedule = $repository->createSchedule();

        $this->assertSame(
            $schedule,
            $repository->findById($schedule->id())
        );
    }

    public function testCannotFindScheduleThatDoesNotExist()
    {
        $repository = new InMemoryScheduleRepository;

        $this->expectException(ScheduleNotFoundException::class);

        $repository->findById(new ScheduleId(new Uuid));
    }

    public function testDoesNothingOnCommit()
    {
        $repository = new InMemoryScheduleRepository;

        $this->assertNull($repository->commit());
    }
}