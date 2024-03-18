<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/script.js"></script>
    <title>Calculateur impot en local</title>
</head>
<body>
<h1>Calculer votre impot</h1>
<form action="/resultat.php" method="post">
    <ul>
        <li>
            <input type="text"  placeholder="nom" id="nom" name="nom"/>
        </li>
        <li>
            <input type="number" id="revenu" name="revenuAnnuel" placeholder="revenu annuel" />
        </li>
        <div class="button">
            <button type="submit" id="button_ok" disabled>Ok</button>
        </div>
    </ul>
</form>
</body>
<footer>
    made by Trouche Xavier
</footer>
</html>
