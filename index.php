<?php

// On inclut la connexion à la base
require_once('connect.php');

// On écrit notre requête
$sql = 'SELECT * FROM `Etat`';

// On prépare la requête
$query = $db->prepare($sql);

// On exécute la requête
$query->execute();

// On stocke le résultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);

require_once('close.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des libelle</title>
</head>
<body>

    <h1>Liste des libelle</h1>
    <table>
        <thead>
            <th>ID</th>
            <th>LIBELLE</th>
        </thead>
        <tbody>
        <?php
            foreach($result as $libelle){
        ?>
                <tr>
                    <td><?= $libelle['id'] ?></td>
                    <td><?= $libelle['libelle'] ?></td>
                    <td><a href="update.php?id=<?= $libelle['id'] ?>">Modifier</a></td>
                </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</body>
</html>