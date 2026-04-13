<?php 

namespace App\Assets;

class AssetHelper {
    private static $basePath = "Assets/";

    public static function css(string $fileName): string {
     
        $fileName = str_replace('.css', '', $fileName);
        
        return self::$basePath . "css/" . $fileName . ".css";
    }

    public static function image(string $fileName): string {
        return self::$basePath . "images/" . $fileName;
    }
} 
