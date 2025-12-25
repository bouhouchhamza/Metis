<?php

class Activite
{
    private string $description;
    private int $projet_id;

    public function __construct($description, $projet_id)
    {
        $this->description = $description;
        $this->projet_id = $projet_id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getProjetId()
    {
        return $this->projet_id;
    }
}
