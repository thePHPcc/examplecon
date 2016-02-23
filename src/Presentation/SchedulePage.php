<?php
namespace examplecon\presentation;

class SchedulePage
{
    public function render(Schedule $schedule)
    {
        // Deliberately insecure
        $buffer = '<h2>' . $schedule->name() . '</h2>';

        $buffer .= '<ol>';

        foreach ($schedule->talks() as $talk) {
            $buffer .= sprintf(
                "<li>%s-%s: %s (%s)</li>",
                $talk->startTime()->format('H:i'),
                $talk->endTime()->format('H:i'),
                $talk->title(),
                $talk->room()
            );
        }

        return $buffer . '</ol>';
    }
}