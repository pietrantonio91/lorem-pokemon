<?php 

$url = 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/';

for ($i=642; $i <= 890; $i++) { 
    $img = __DIR__."/pokemon/$i.png";
    file_put_contents($img, file_get_contents($url.$i.'.png'));
}