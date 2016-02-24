<?php
namespace examplecon;

class Uuid
{
    /**
     * @var string
     */
    private $uuid;

    public function __construct($uuid = null)
    {
        if ($uuid === null) {
            $uuid = uniqid('mylittleuuid', true);
        }

        $this->uuid = $uuid;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->uuid;
    }
}