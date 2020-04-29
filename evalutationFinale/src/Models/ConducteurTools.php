<?php


namespace App\Models;


class ConducteurTools
{
    private $databasetools;

    public function __construct($databasetools)
    {
        $this->databasetools = $databasetools;
    }

    public function getAllConducteur() {
        $results = $this->databasetools->executeQuery("SELECT * FROM conducteur");
        $conducteurs = [];
        foreach ($results as $result){
            $conducteur = new Conducteur();
            $conducteur->setId($result['con_id']);
            $conducteur->setNom($result['con_nom']);
            $conducteur->setPrenom($result['con_prenom']);
            array_push($conducteurs, $conducteur);
        }
        return $conducteurs;
    }
    public function hydrateWithPostCon($con, $data)
    {
        $con->setNom($data['nom']);
        $con->setPrenom($data['prenom']);

        return $con;

    }

    public function addCon($con){
        $params = [
            ["paramKey" => ":con_nom", "paramValue" => $con->getNom()],
            ["paramKey" => ":con_prenom", "paramValue" => $con->getPrenom()],
            ];
        $this->databasetools->insertQuery("INSERT INTO conducteur (con_nom, con_prenom) VALUES (:con_nom, :con_prenom)", $params);
    }

}