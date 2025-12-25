<?php

class Membre
{
    private string $nom;
    private string $email;

    public function __construct($nom, $email)
    {
        $this->nom = $nom;
        $this->email = $email;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getEmail()
    {
        return $this->email;
    }
}
