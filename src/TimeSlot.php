<?php
namespace examplecon;

class TimeSlot
{
    /**
     * @var int
     */
    private $number;

    /**
     * @param int $number
     *
     * @throws InvalidArgumentException
     */
    public function __construct($number)
    {
        $this->ensureInteger($number);

        $this->number = $number;
    }

    /**
     * @return int
     */
    public function number()
    {
        return $this->number;
    }

    /**
     * @param TimeSlot $timeSlot
     *
     * @return bool
     */
    public function equals(TimeSlot $timeSlot)
    {
        if ($timeSlot->number() == $this->number) {
            return true;
        }

        return false;
    }

    /**
     * @param int $number
     *
     * @throws InvalidArgumentException
     */
    private function ensureInteger($number)
    {
        if (!is_int($number)) {
            throw new InvalidArgumentException;
        }
    }
}