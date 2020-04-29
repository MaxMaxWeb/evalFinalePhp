<?php


namespace App\Models;


class VehiculeTools
{
    private $databasetools;

    public function __construct($databasetools)
    {
        $this->databasetools = $databasetools;
    }

    public function getAllVehicule() {
        $results = $this->databasetools->executeQuery("SELECT * FROM vehicule");
        $vehicules = [];
        foreach ($results as $result){
            $vehicule = new Vehicule();
            $vehicule->setId($result['veh_id']);
            $vehicule->setMarque($result['veh_marque']);
            $vehicule->setModele($result['veh_modele']);
            $vehicule->setCouleur($result['veh_couleur']);
            $vehicule->setImmatriculation($result['veh_immatriculation']);
            array_push($vehicules, $vehicule);
        }
        return $vehicules;
    }

    public function addNewVehicule($vehicule){
        $params = [
            ["paramKey" => ":veh_marque", "paramValue" => $vehicule->getMarque()],
            ["paramKey" => ":veh_modele", "paramValue" => $vehicule->getModele()],
            ["paramKey" => ":veh_couleur", "paramValue" => $vehicule->getCouleur()],
            ["paramKey" => ":veh_immatriculation", "paramValue" => $vehicule->getImmatriculation()]
        ];

            $this->databasetools->insertQuery("INSERT INTO vehicule (veh_marque, veh_modele, veh_couleur, veh_immatriculation) VALUES (:veh_marque, :veh_modele, :veh_couleur, :veh_immatriculation)", $params);


    }

    public function hydrateWithPostVeh($vehicule, $data)
    {
        $vehicule->setMarque($data['marque']);
            $vehicule->setModele($data['modele']);
            $vehicule->setCouleur($data['couleur']);
            $vehicule->setImmatriculation($data['immatriculation']);
            return $vehicule;

    }
}