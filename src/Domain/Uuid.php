<?php
namespace examplecon;

class Uuid
{
    /**
     * @var string
     */
    private $uuid;

    public function __construct()
    {
        $this->uuid = uniqid('mylittleuuid', true);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->uuid;
    }
}