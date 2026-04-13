<?php 
namespace App\Presenters;

class UserPresenter {

    public function formatData(array $user): array {
        return [
       
            'name' => ucwords(strtolower($user['name'])),
            
          
            'email' => strtolower($user['email']),
            
          
            'date_member' => date('d/m/Y', strtotime($user['created_at'])),
            
            'greeting' => $this->getGreeting()
        ];
    }

    private function getGreeting(): string {
        $hour = date('H');
        if ($hour < 12) return "Bom dia";
        if ($hour < 18) return "Boa tarde";
        return "Boa noite";
    }
}
