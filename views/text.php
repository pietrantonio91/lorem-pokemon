<?php 

require_once(__DIR__.'/../classes/Lorem.php');

$json = file_get_contents(__DIR__ . '/../json/pokemon.en.json');
$array = json_decode($json);

$lorem = new Lorem($array);

// words, sentences, paragraphs
$type = $_GET['type'] ?? null;
$quantity = (int)$_GET['quantity'] ?? 1;

header('Content-type: application/json');

$output = '';
switch ($type) {
    case 'words':
        $output = $lorem->words($quantity);
        break;

    case 'sentences':
        $output = $lorem->sentences($quantity);
        break;

    case 'paragraphs':
        $output = $lorem->paragraphs($quantity);
        break;
    
    default:
        $output = $lorem->words($quantity);
        break;
}

echo json_encode([
    'code' => 200,
    'text' => $output
]);

die();