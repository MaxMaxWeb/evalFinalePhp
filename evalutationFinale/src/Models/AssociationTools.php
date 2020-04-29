<?php


namespace App\Models;


class AssociationTools
{
    private $databasetools;

    public function __construct($databasetools)
    {
        $this->databasetools = $databasetools;
    }

    public function getAllAssoc(){
        $results = $this->databasetools->executeQuery("SELECT * from ass_veh_con  INNER join conducteur on conducteur.con_id = ass_veh_con.ass_conducteur 
INNER JOIN vehicule on vehicule.veh_id = ass_veh_con.ass_vehicule 
WHERE ass_veh_con.ass_conducteur = conducteur.con_id");
        $assocs = [];
        foreach ($results as $result){
            $assoc = new Association();
            $assoc->setId($result['ass_id']);
            $assoc->setAssConducteur($result['con_prenom']." ".$result['con_nom']);
            $assoc->setAssVoiture($result['veh_marque']." ".$result['veh_modele']);
            array_push($assocs, $assoc );
        }
        return $assocs;
    }

    public function hydrateAssoPost($asso, $data){
        $asso->setAssVoiture($data['vehId']);
        $asso->setAssConducteur($data['conId']);
        return $asso;
    }

    public function addAsso($asso){
        $params = [
            ["paramKey" => ":ass_vehicule", "paramValue" => $asso->getAssVoiture()],
            ["paramKey" => ":ass_conducteur", "paramValue" => $asso->getAssConducteur()],
        ];
        $this->databasetools->insertQuery("INSERT INTO ass_veh_con (ass_vehicule, ass_conducteur) VALUES (:ass_vehicule, :ass_conducteur)", $params);
    }
}