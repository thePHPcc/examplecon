<?php
namespace examplecon;

class Talk
{
    /**
     * @var TimeSlot
     */
    private $timeSlot;

    /**
     * @param TimeSlot $timeSlot
     */
    public function __construct(TimeSlot $timeSlot)
    {
        $this->timeSlot = $timeSlot;
    }

    /**
     * @param Talk $talk
     *
     * @return bool
     */
    public function conflictsWith(Talk $talk)
    {
        if ($talk->timeSlot()->equals($this->timeSlot)) {
            return true;
        }

        return false;
    }

    /**
     * @return TimeSlot
     */
    public function timeSlot()
    {
        return $this->timeSlot;
    }
}