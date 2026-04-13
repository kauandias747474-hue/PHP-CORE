<?php


require_once __DIR__ . '/vendor/autoload.php';

use App\Presenters\UserPresenter;
use App\ViewEngine\Renderer;
use App\Responses\JsonResponse;
use App\Assets\AssetHelper;

$userData = [
    'name' => 'felipe silva',
    'email' => 'FELIPE@EXEMPLO.COM',
    'created_at' => '2024-04-13'
];



try {
   
    $presenter = new UserPresenter();
    $cleanData = $presenter->formatData($userData);

    if (isset($_GET['api']) && $_GET['api'] === 'true') {
        JsonResponse::send($cleanData);
    }

    $renderer = new Renderer();
    $renderer->render('user_profile', $cleanData);

} catch (\Exception $e) {
    echo "<h1>Ops! Algo deu errado.</h1>";
    echo "<p>" . $e->getMessage() . "</p>";
}
