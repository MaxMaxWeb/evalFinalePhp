<?php

use App\Tools\DatabaseTools;
use App\Models\VehiculeTools;
use App\Models\Vehicule;

$dbTools = new DatabaseTools("mysql", "vtc", "root", "root");

$vehTools = new VehiculeTools($dbTools);

$vehicules = $vehTools->getAllVehicule();

if (!empty($_POST)){
 $newVeh = new Vehicule();
 $vehicule = $vehTools->hydrateWithPostVeh($newVeh, $_POST);



 $vehTools->addNewVehicule($vehicule);
}

echo $_POST['couleur'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a href="http://localhost:9090/conducteur"> Conducteur </a>
    <a href="http://localhost:9090/vehicule"> Véhicule</a>
    <a href="http://localhost:9090/association"> Association</a>
</nav>

<table class="table">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">marque</th>
        <th scope="col">modele</th>
        <th scope="col">couleur</th>
        <th scope="col">immatriculation </th>
        <th scope="col">Modification</th>
        <th scope="col">Suppression </th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($vehicules as $vehicule){ ?>
<tr>
        <td scope="row"> <?= $vehicule->getId() ?> </td>
        <td scope="row"> <?= $vehicule->getMarque() ?> </td>
        <td scope="row"> <?= $vehicule->getModele() ?></td>
        <td scope="row"> <?= $vehicule->getCouleur() ?> </td>
        <td scope="row"> <?=$vehicule->getImmatriculation() ?> </td>
        <td scope="row"> Modif</td>
        <td scope="row"> Modif </td>
</tr>

    <?php } ?>
    </tbody>
</table>

<form enctype="multipart/form-data" method="post">

    <input type="text" name="marque" placeholder="marque">
    <input type="text" name="modele" placeholder="modele">
    <input type="text" name="couleur" placeholder="couleur">
    <input type="text" name="immatriculation" placeholder="immatriculation">

    <input type="submit" value="ajouter ce véhicule">

</form>


</body>
</html>
