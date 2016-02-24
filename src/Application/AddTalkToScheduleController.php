<?php
namespace examplecon\application;

use examplecon\SimpleScheduleRepository;

class AddTalkToScheduleController
{
    public function execute()
    {
        $command = new SelectTalkCommand(new SimpleScheduleRepository());

        $command->execute(
            $this->request->post('id'),
            $this->request->post('timeslot')
        );
    }
}