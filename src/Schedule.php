<?php
namespace examplecon;

class Schedule
{
    /**
     * @var Talk[]
     */
    private $talks = [];

    /**
     * @param Talk $talk
     *
     * @throws ScheduleConflictException
     */
    public function add(Talk $talk)
    {
        $this->ensureDoesNotConflict($talk);

        $this->talks[] = $talk;
    }

    /**
     * @param Talk $talk
     *
     * @throws ScheduleConflictException
     */
    private function ensureDoesNotConflict(Talk $talk)
    {
        foreach ($this->talks as $previouslySelectedTalk) {
            if ($talk->conflictsWith($previouslySelectedTalk)) {
                throw new ScheduleConflictException;
            }
        }
    }

    /**
     * @return Talk[]
     */
    public function talks()
    {
        return $this->talks;
    }
}