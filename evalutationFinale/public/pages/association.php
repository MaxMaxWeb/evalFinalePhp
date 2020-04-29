<?php

use App\Tools\DatabaseTools;
use App\Models\AssociationTools;
use App\Models\Association;
use App\Models\ConducteurTools;
use App\Models\VehiculeTools;

$dbTools = new DatabaseTools("mysql", "vtc", "root", "root");

$assTools = new AssociationTools($dbTools);

$assocs = $assTools->getAllAssoc();

$conTools = new ConducteurTools($dbTools);
$vehTools = new VehiculeTools($dbTools);

$cons = $conTools->getAllConducteur();
$vehs = $vehTools->getAllVehicule();

if (!empty($_POST)){
    $newAss = new Association();
    $asso = $assTools->hydrateAssoPost($newAss, $_POST);


    $assTools->addAsso($asso);
}
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
        <th scope="col">Conducteur</th>
        <th scope="col">Voiture</th>
        <th scope="col">Modification</th>
        <th scope="col">Suppression </th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($assocs as $assoc){ ?>

        <tr>

        <td scope="row"> <?= $assoc->getId() ?> </td>
        <td scope="row"> <?= $assoc->getAssConducteur() ?> </td>
        <td scope="row"> <?= $assoc->getAssVoiture() ?></td>
        <td scope="row"> Modif</td>
        <td scope="row"> Modif </td>

        </tr>

    <?php } ?>
    </tbody>

</table>

<form method="post" enctype="multipart/form-data">
    <p> ID du conducteur </p>
    <select name="conId">
    <?php foreach($cons as $con){ ?>

        <option> <?= $con->getId() ?> </option>


        <?php } ?>
    </select>
<p> Id du véhicule</p>
    <select name="vehId">
        <?php foreach($vehs as $veh){ ?>

            <option> <?= $veh->getId() ?> </option>


        <?php } ?>
    </select>

    <input type="submit" value="associer un conducteur et une voiture">
</form>


</body>
</html>


