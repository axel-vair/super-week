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
    <button id='submit'>Chercher l'utilisateur</button>
</form>

<form id='book'>
    <label>Id du livre</label>
    <input name="book" type="text">
    <button id='submit'>Chercher le livre</button>
</form>


</body>
</html>
