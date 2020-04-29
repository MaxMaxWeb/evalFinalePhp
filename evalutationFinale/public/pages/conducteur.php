<?php

use App\Models\Conducteur;
use App\Tools\DatabaseTools;
use App\Models\ConducteurTools;

$dbTools = new DatabaseTools("mysql", "vtc", "root", "root");

$conTools = new ConducteurTools($dbTools);

$conducteurs = $conTools->getAllConducteur();

if (!empty($_POST)){
    $newCon = new Conducteur();
    $conducteur = $conTools->hydrateWithPostCon($newCon, $_POST);


    $conTools->addCon($conducteur);
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
        <th scope="col">prenom</th>
        <th scope="col">nom</th>
        <th scope="col">Modification</th>
        <th scope="col">Suppression </th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($conducteurs as $conducteur){ ?>
<tr>
        <td scope="row"> <?= $conducteur->getId() ?> </td>
        <td scope="row"> <?= $conducteur->getPrenom() ?> </td>
        <td scope="row"> <?= $conducteur->getNom() ?></td>
        <td scope="row"> Modif</td>
        <td scope="row"> Modif </td>

</tr>

    <?php } ?>
    </tbody>
</table>

<form method="post" enctype="multipart/form-data">
    <input type="text" name="prenom" placeholder="prenom">
    <input type="text" name="nom" placeholder="nom">
    <input type="submit" value="ajoutez">
</form>


</body>
</html>
