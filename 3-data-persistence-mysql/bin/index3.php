<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Clearing System</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #1a1a1a; color: white; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .box { border: 2px solid #00ff00; padding: 40px; border-radius: 20px; text-align: center; box-shadow: 0 0 20px rgba(0,255,0,0.2); }
        h1 { color: #00ff00; text-transform: uppercase; letter-spacing: 2px; }
        .status { background: #333; padding: 10px; border-radius: 5px; margin-top: 20px; font-family: monospace; }
    </style>
</head>
<body>
    <div class="box">
        <h1>✅ Sistema Online</h1>
        <p>Servidor PHP rodando na porta <b>8000</b></p>
        <div class="status">
            Local: C:\Users\User\public\index.php
        </div>
        <p>Pronto para processar Clearing.</p>
    </div>
</body>
</html>
