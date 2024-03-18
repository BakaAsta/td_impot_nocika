<?php

require "Impot.php";


// on crée l'impot en récupérer les données en POst du formualire
// Post car bcp + sécurisé car les données ne sont pas dans le query string
$impot  = new impot($_POST["nom"], $_POST["revenuAnnuel"]);
$impot->calculImpot($_POST["revenuAnnuel"]);

// creation de la bdd

try {
    $db = new PDO('sqlite:impots.sqlite3');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $db->exec("CREATE TABLE IF NOT EXISTS result (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nom TEXT,
        revenu INTEGER,
        taux_impot REAL,
        montant_impot REAL,
        date_creation DATETIME)");

    // insertion dans la BDD
// Préparation de la requête d'insertion
    $stmt = $db->prepare("INSERT INTO result (nom, revenu, taux_impot, montant_impot, date_creation) VALUES (:nom, :revenu, :taux_impot, :montant_impot, :date_creation)");

    $nom = $impot->getNom();
    $revenuAnnuel = $impot->getSalaire();
    $tauxImpot = $impot->getTauxImpot();
    $montantImpot = $impot->getMontantImpot();
    $dateCreation = new DateTime(); // Supposons que c'est votre objet DateTime
    $dateCreationStr = $dateCreation->format('Y-m-d H:i:s'); // Convertit en chaîne de caractères


// Liaison des paramètres
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':revenu', $revenuAnnuel);
    $stmt->bindParam(':taux_impot', $tauxImpot);
    $stmt->bindParam(':montant_impot', $montantImpot);
    $stmt->bindParam(':date_creation', $dateCreationStr);

// Exécution de la requête
    $stmt->execute();

    // affiche l'impot
    echo '
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script src="js/script.js"></script>
    <title>Document</title>
</head>
<body>';

    echo '<div class="container_impot">';
    echo $impot->afficheImpot();
    echo '</div>';

    echo '</body>
</html>
';

} catch (Exception $e) {
    echo "Erreur : ".$e->getMessage();
}
?>