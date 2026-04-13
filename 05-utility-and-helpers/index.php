<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$autoloadPath = __DIR__ . '/vendor/autoload.php';

if (!file_exists($autoloadPath)) {
    die("Erro: Execute 'php composer.phar dump-autoload' no terminal.");
}

require_once $autoloadPath;

use App\Entities\User;
use App\ValueObjects\Email;
use App\ValueObjects\Password;
use App\Validators\CpfValidator;
use App\Formatters\CurrencyFormatter;
use App\Formatters\DateFormatter;
use App\Helpers\StringHelper;
use App\Services\UserService;
use App\Exceptions\DomainException;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema PHP Profissional</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f0f2f5; margin: 0; padding: 20px; color: #333; }
        .container { max-width: 800px; margin: auto; background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h1 { color: #1a73e8; border-bottom: 2px solid #e8f0fe; padding-bottom: 10px; }
        .section { background: #fafafa; border: 1px solid #eee; padding: 15px; border-radius: 8px; margin-bottom: 20px; }
        h3 { margin-top: 0; color: #5f6368; }
        .success { color: #188038; font-weight: bold; }
        .alert { background: #fef7e0; border: 1px solid #feefc3; color: #b06000; padding: 15px; border-radius: 8px; }
        .error { background: #fce8e6; border: 1px solid #fad2cf; color: #c5221f; padding: 15px; border-radius: 8px; }
    </style>
</head>
<body>

<div class="container">
    <h1>🚀 Painel de Controle</h1>
    <p><strong><?php echo DateFormatter::getGreeting(); ?>!</strong> Hoje é <?php echo DateFormatter::toBrl(date('Y-m-d')); ?></p>

    <?php try { ?>
        
        <div class="section">
            <h3>🛠️ Utilitários e Formatação</h3>
            <p><strong>CPF:</strong> <?php echo CpfValidator::isValid("12345678901") ? "✅ Válido" : "❌ Inválido"; ?></p>
            <p><strong>Saldo:</strong> <?php echo CurrencyFormatter::toBrl(2500.50); ?></p>
            <p><strong>Slug do Curso:</strong> <code><?php echo StringHelper::slug("Arquitetura de Sistemas PHP"); ?></code></p>
        </div>

        <div class="section">
            <h3>🧠 Processamento de Domínio</h3>
            <?php
                $user = new User(1, "Estudante Pro", new Email("aluno@exemplo.com"), new Password("senha123456"));
                $service = new UserService();
                
                if ($service->register($user)) {
                    echo "<p class='success'>✅ Usuário registrado com sucesso!</p>";
                    $service->sendWelcomeEmail($user);
                }
            ?>
            <p><strong>Nome:</strong> <?php echo $user->getName(); ?></p>
            <p><strong>E-mail:</strong> <?php echo $user->getEmail()->getValue(); ?></p>
        </div>

    <?php } catch (DomainException $e) { ?>
        <div class="alert">
            <strong>⚠️ Regra de Negócio:</strong> <?php echo $e->getMessage(); ?>
        </div>
    <?php } catch (\Throwable $e) { ?>
        <div class="error">
            <strong>🔥 Erro Crítico:</strong> <?php echo $e->getMessage(); ?>
            <br><small>Arquivo: <?php echo $e->getFile(); ?> na linha <?php echo $e->getLine(); ?></small>
        </div>
    <?php } ?>
</div>

</body>
</html>
