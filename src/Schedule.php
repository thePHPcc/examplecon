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
        if ($this->conflictsWithPreviousSelection($talk)) {
            throw new ScheduleConflictException;
        }

        $this->talks[] = $talk;
    }

    /**
     * @param Talk $talk
     *
     * @return bool
     */
    private function conflictsWithPreviousSelection(Talk $talk)
    {
        foreach ($this->talks as $previouslySelectedTalk) {
            if ($talk->conflictsWith($previouslySelectedTalk)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return Talk[]
     */
    public function talks()
    {
        return $this->talks;
    }
}