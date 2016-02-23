<?php
namespace examplecon;

class ScheduleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return Schedule
     */
    public function testIsInitiallyEmpty()
    {
        $schedule = new Schedule(new ScheduleId(new Uuid));

        $this->assertEmpty($schedule->talks());

        return $schedule;
    }

    /**
     * @param Schedule $schedule
     *
     * @depends testIsInitiallyEmpty
     *
     * @return Schedule
     */
    public function testTalkCanBeAddedToEmptySchedule(Schedule $schedule)
    {
        $talk = $this->createTalkWithoutConflict();

        $schedule->add($talk);

        $this->assertCount(1, $schedule->talks());
        $this->assertContains($talk, $schedule->talks());

        return $schedule;
    }

    /**
     * @param Schedule $schedule
     *
     * @depends testTalkCanBeAddedToEmptySchedule
     */
    public function testNonConflictingTalkCanBeAddedToNonEmptySchedule(Schedule $schedule)
    {
        $expectedCount = count($schedule->talks()) + 1;

        $talk = $this->createTalkWithoutConflict();

        $schedule->add($talk);

        $this->assertCount($expectedCount, $schedule->talks());
        $this->assertContains($talk, $schedule->talks());
    }

    public function testConflictingTalkCannotBeAddedToSchedule()
    {
        $schedule = new Schedule(new ScheduleId(new Uuid));

        $schedule->add($this->createTalkWithConflict());

        $this->expectException(ScheduleConflictException::class);

        $schedule->add($this->createTalkWithConflict());
    }

    /**
     * @return Talk|\PHPUnit_Framework_MockObject_MockObject
     */
    private function createTalkWithConflict()
    {
        return $this->createTalk(true);
    }

    /**
     * @return Talk|\PHPUnit_Framework_MockObject_MockObject
     */
    private function createTalkWithoutConflict()
    {
        return $this->createTalk(false);
    }

    /**
     * @param bool $conflicts
     *
     * @return Talk|\PHPUnit_Framework_MockObject_MockObject
     */
    private function createTalk($conflicts)
    {
        /** @var Talk|\PHPUnit_Framework_MockObject_MockObject $talk */
        $talk = $this->getMockWithoutInvokingTheOriginalConstructor(Talk::class);

        $talk->method('conflictsWith')->willReturn($conflicts);

        return $talk;
    }
}