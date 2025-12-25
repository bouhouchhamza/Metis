<?php

abstract class Projet
{
    protected string $titre;
    protected int $membre_id;

    public function __construct($titre, $membre_id)
    {
        $this->titre = $titre;
        $this->membre_id = $membre_id;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    abstract public function getType();
}
