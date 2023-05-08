<?php
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="scripts/home.js" defer></script>
    <title>Accueil</title>
</head>
<body>
<button id="users">Utilisateurs</button>
<div id="displayUsers"></div>

<button id="books">Livres</button>
<div id='displayBooks'></div>

<form id="user">
    <label>Id de l'utilisateur</label>
    <input name="user" type="text">
    <button type="submit" id='user'>Chercher l'utilisateur</button>
</form>
<div id="displayOneUser"></div>


<form id='book'>
    <label>Id du livre</label>
    <input name="book" type="text">
    <button type="submit" id='book'>Chercher le livre</button>
</form>
<div id='displayOneBook'></div>


</body>
</html>
