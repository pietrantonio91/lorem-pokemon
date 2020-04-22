<?php

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request_arr = explode('/', $request);
$meta_title = 'Lorem Pokémon';
$meta_description = 'Generate random Pokémon images.';
switch ($request_arr[1]) {
    case '' :
        $meta_title = 'Lorem Pokémon Image Randomizer';
        $meta_description = 'Generate random Pokémon images for your website or you projects, it\'s easy.';
        $page = 'index';
        break;
    case 'pokemon' :
        require __DIR__ . '/views/pokemon.php';
        die();
        break;
    case 'lorem' :
        $meta_title = 'Lorem Ipsum Pokémon text generator';
        $meta_description = 'Generate random Pokémon text (lorem ipsum) for your website or you projects, it\'s easy.';
        $page = 'lorem';
        break;
    case 'generate_lorem' :
        require __DIR__ . '/views/text.php';
        die();
        break;
    default:
        http_response_code(404);
        $meta_title = 'Sorry, Pokémon not found';
        $page = '404';
        break;
}

require __DIR__ . '/views/layout.php';