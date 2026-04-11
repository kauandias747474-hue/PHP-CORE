<?php

require_once 'MySqlConnection.php';

echo "<h2>🚀 Sistema de Clearing: Painel de Controle</h2>";

try {

    $db = MySqlConnection::getConnection();
    
    echo "<p style='color: green; font-weight: bold;'>SUCESSO: O PHP conectou ao MySQL!</p>";

   
    $query = $db->query("SELECT VERSION() as versao");
    $resultado = $query->fetch();

    echo "<strong>Versão do Banco de Dados:</strong> " . $resultado['versao'] . "<br>";
    echo "<strong>Status:</strong> Pronto para criar tabelas e transações.";

} catch (Exception $e) {
   
    echo "<p style='color: red; font-weight: bold;'> ERRO NO SISTEMA:</p>";
    echo "<p style='background: #fee; padding: 10px; border: 1px solid red;'>" . $e->getMessage() . "</p>";
    echo "<p><em>Verifique se o MySQL no XAMPP está ligado na porta 3307 e se você criou o banco 'modulo3php'.</em></p>";
}
?>
