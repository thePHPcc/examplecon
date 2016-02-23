<?php
namespace examplecon\presentation;

class Schedule
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Talk[]
     */
    private $talks = [];

    /**
     * @param string $name
     * @param Talk[] $talks
     */
    public function __construct($name, array $talks)
    {
        $this->name = $name;

        foreach ($talks as $talk) {
            $this->add($talk);
        }
    }

    /**
     * @return Talk[]
     */
    public function talks()
    {
        return $this->talks;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @param Talk $talk
     */
    private function add(Talk $talk)
    {
        $this->talks[] = $talk;
    }
}