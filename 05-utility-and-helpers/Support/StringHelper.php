<?php
namespace App\Helpers;

class StringHelper {
    public static function slug(string $text): string {
        $text = mb_strtolower($text);
        $text = preg_replace('/[^a-z0-9]+/', '-', $text);
        return trim($text, '-');
    }

    public static function truncate(string $text, int $limit = 20): string {
        if (mb_strlen($text) <= $limit) return $text;
        return mb_substr($text, 0, $limit) . "...";
    }
}
