<?php
namespace App\Messaging;

class SendGridMailer {
    public function send(string $to, string $subject): void {
        echo "📧 Enviando e-mail para '{$to}' com o assunto '{$subject}'...<br>";
       
        if (rand(1, 10) === 1) {
            throw new \Exception("Falha na API do SendGrid.");
        }

        echo "✅ E-mail simulado enviado via SendGrid!<br>";
        echo "🔗 Link: https://sendgrid.com/email/view/12345<br>";
    }
}
