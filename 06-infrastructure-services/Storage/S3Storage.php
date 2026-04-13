<?php
namespace App\Storage;

class S3Storage {
    public function upload(string $fileName): void {
        echo "☁️ Fazendo upload do arquivo '{$fileName}' para o bucket S3...<br>";

        if (empty($fileName)) {
            throw new \Exception("Nome do arquivo inválido para upload.");
        }

        echo "✅ Upload concluído para AWS S3!<br>";
        echo "🔗 Link: https://s3.amazonaws.com/meu-bucket/{$fileName}<br>";
    }
}
