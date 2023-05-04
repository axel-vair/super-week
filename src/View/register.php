<?php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="scripts/register.js"></script>
    <title>Inscription</title>
</head>
<body>
<h1>Mon formulaire d'inscription</h1>
<div class="error"></div>
<form id="registerForm" method="POST">
    <label for="firstname">Prénom</label>
    <input name="firstname" type="text">
    <br>
    <label for='lastname'>Nom</label>
    <input name='lastname' type='text'>
    <br>
    <label for='email'>email</label>
    <input name='email' type='email'>
    <br>
    <label for='password'>Mot de passe</label>
    <input name='password' type='password'>
    <br>

    <button type="submit">S'inscrire</button>
</form>
</body>
</html>
