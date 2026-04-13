<?php

function dd($data) {
    echo "<pre style='background:#222; color:#0f0; padding:20px;'>";
    var_dump($data);
    echo "</pre>";
    die();
}

function formatDate($date) {
    return date('d/m/Y', strtotime($date));
}
