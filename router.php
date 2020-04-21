<?php

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request_arr = explode('/', $request);
switch ($request_arr[1]) {
    case '' :
        $meta_title = 'Lorem Pokémon Image Randomizer';
        $page = 'index';
        break;
    case 'pokemon' :
        require __DIR__ . '/views/pokemon.php';
        die();
        break;
    default:
        http_response_code(404);
        $meta_title = 'Sorry, Pokémon not found';
        $page = '404';
        break;
}

require __DIR__ . '/views/layout.php';