<?php 


namespace Tests\Mocks;

class MockMailer {
    public function send($to, $subject, $body) {
       
        echo "   [MOCK] E-mail simulado enviado para: $to\n";
        return true;
    }
}
