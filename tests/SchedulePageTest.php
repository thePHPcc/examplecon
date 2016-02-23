<?php
namespace examplecon\presentation;

class SchedulePageTest extends \PHPUnit_Framework_TestCase
{
    public function testIsRenderedCorrectly()
    {
        $page = new SchedulePage;

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

        $this->assertEquals(
            '<h2>Sebastian\'s Little Schedule</h2><ol><li>09:00-09:45: Foo (Room 23)</li><li>10:00-10:45: Bar (Room 42)</li></ol>',
            $page->render($schedule)
        );
    }
}