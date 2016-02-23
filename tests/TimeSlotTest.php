<?php
namespace examplecon;

class TimeSlotTest extends \PHPUnit_Framework_TestCase
{
    public function testCanBeCreatedFromInteger()
    {
        $timeSlot = new TimeSlot(1);

        $this->assertInstanceOf(TimeSlot::class, $timeSlot);

        return $timeSlot;
    }

    /**
     * @param TimeSlot $timeSlot
     *
     * @depends testCanBeCreatedFromInteger
     */
    public function testNumberCanBeRetrieved(TimeSlot $timeSlot)
    {
        $this->assertEquals(1, $timeSlot->number());
    }

    /**
     * @param TimeSlot $timeSlot
     *
     * @depends testCanBeCreatedFromInteger
     */
    public function testRecognizesOtherTimeSlotAsEqual(TimeSlot $timeSlot)
    {
        $this->assertTrue($timeSlot->equals(new TimeSlot(1)));
    }

    /**
     * @param TimeSlot $timeSlot
     *
     * @depends testCanBeCreatedFromInteger
     */
    public function testRecognizesOtherTimeSlotAsNotEqual(TimeSlot $timeSlot)
    {
        $this->assertFalse($timeSlot->equals(new TimeSlot(2)));
    }

    public function testCannotBeCreatedFromNonInteger()
    {
        $this->expectException(InvalidArgumentException::class);

        new TimeSlot(null);
    }
}