<?php
namespace App\Controllers;

class UserController {
    private $mailer;

   
    public function __construct($mailer = null) {
        $this->mailer = $mailer;
    }

    public function register($data) {
       
        if (empty($data['email'])) return false;
        
        
        if ($this->mailer) {
            $this->mailer->send($data['email'], 'Bem-vindo', 'Olá!');
        }
        
        return true;
    }
}
