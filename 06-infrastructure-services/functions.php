<?php


function dd($data) {
    echo "<pre style='background: #222; color: #5af78e; padding: 15px; border-radius: 5px;'>";
    var_dump($data);
    echo "</pre>";
    die();
}
