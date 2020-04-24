<?php 

$read_env = [];
try {
    // leggo il .env 
    $file_env = __DIR__ . '/.env';
    $read_env = file($file_env);
} catch (\Throwable $th) {
    //throw $th;
}

if (count($read_env)) {
    foreach ($read_env as $env_var) {
        $env_var = explode('=', $env_var);
        define($env_var[0], $env_var[1]);
    }
}

$base_url = BASE_URL ?? 'http://localhost:8083';

require_once('router.php');