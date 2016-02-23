<?php
namespace examplecon\presentation;

class Talk
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $room;

    /**
     * @var \DateTimeImmutable
     */
    private $startTime;

    /**
     * @var \DateTimeImmutable
     */
    private $endTime;

    /**
     * @param string             $title
     * @param string             $room
     * @param \DateTimeImmutable $startTime
     * @param \DateTimeImmutable $endTime
     */
    public function __construct($title, $room, \DateTimeImmutable $startTime, \DateTimeImmutable $endTime)
    {
        $this->title     = $title;
        $this->room      = $room;
        $this->startTime = $startTime;
        $this->endTime   = $endTime;
    }

    /**
     * @return string
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function room()
    {
        return $this->room;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function startTime()
    {
        return $this->startTime;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function endTime()
    {
        return $this->endTime;
    }
}