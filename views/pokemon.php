<?php 

// se è settato un terzo parametro redirect
if (isset($request_arr[3])) {
    $seed = $request_arr[3];
} else {
    $seed = rand(1, 999);
    header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]/$seed");
}
// prendo un numero da 1 a 890 (max pokedex)
$pokedex_id = rand(1, 890);
// prendo l'immagine da questo archivio
// $image = "https://pokeres.bastionbot.org/images/pokemon/$pokedex_id.png";
// $image = "https://assets.pokemon.com/assets/cms2/img/pokedex/full/$pokedex_id.png";
$image = "./pokemon_images/$pokedex_id.png";
// tipo di file
$type = image_type_to_mime_type(exif_imagetype($image));

// die("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
header('Content-Type: '.$type);

// parametro get per w e h
$side = $request_arr[2] ?? 500;
if($side > 1920) $side = 1920;
if($side == '') $side = 500;

$dst = resize_image($image, $side, $side, $type);
if ($type == 'image/png') {
    imagepng($dst);
} elseif($type == 'image/jpg') {
    imagejpeg($dst);
}
imagejpeg($dst);

function resize_image($file, $w, $h, $type = 'image/png', $crop=false) {
    list($width, $height) = getimagesize($file);
    $r = $width / $height;
    if ($crop) {
        if ($width > $height) {
            $width = ceil($width-($width*abs($r-$w/$h)));
        } else {
            $height = ceil($height-($height*abs($r-$w/$h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w/$h > $r) {
            $newwidth = $h*$r;
            $newheight = $h;
        } else {
            $newheight = $w/$r;
            $newwidth = $w;
        }
    }
    if ($type == 'image/png') {
        $src = imagecreatefrompng($file);
    } elseif($type == 'image/jpg') {
        $src = imagecreatefromjpeg($file);
    }
    $dst = imagecreatetruecolor($newwidth, $newheight);
    if ($type == 'image/png') {
        imagealphablending($dst, false);
        imagesavealpha($dst, true);
    }
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    return $dst;
}