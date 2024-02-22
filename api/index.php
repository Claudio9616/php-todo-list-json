<?php
header("Access-Control-Allow-Origin: http://127.0.0.1:5000");
header("Access-Control-Allow-Headers: X-Requested-With");
// Imposta l'header per rispondere con JSON
header('Content-Type: application/json');

// Il path al file JSON
$json_path = __DIR__ . '/../data/tasks.json';

// Controlla se il file esiste e se è leggibile
if (file_exists($json_path) && is_readable($json_path)) {
    // Prende i contenuti del file JSON
    $json_data = file_get_contents($json_path);
    // Decodifica i dati JSON in un array associativo
    $tasks = json_decode($json_data, true);
} else {
    // Gestisce l'errore se il file non esiste o non è leggibile
    $tasks = ['error' => 'Unable to load tasks.'];
}

// Invia la risposta JSON
echo json_encode($tasks);