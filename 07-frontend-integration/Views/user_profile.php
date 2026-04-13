<?php use App\Assets\AssetHelper; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="<?= AssetHelper::css('style') ?>">
</head>
<body>
    <h1>Olá, <?= $name ?>!</h1>
    <img src="<?= AssetHelper::image('avatar.png') ?>" alt="Foto de Perfil">
</body>
</html>
