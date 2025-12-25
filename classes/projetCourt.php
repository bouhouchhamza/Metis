<?php
require_once "projet.php";

class ProjetCourt extends Projet
{
    public function getType()
    {
        return "court";
    }
}
