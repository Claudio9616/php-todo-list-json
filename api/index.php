<?php
// per cors policy
header("Access-Control-Allow-Origin: http://localhost");
header("Access-Control-Allow-Headers: X-Requested-With");
// voglio rispondere in json per leggere i dati
header('Content-Type: application/json');
// path del json
$json_path = __DIR__ . '/../data/tasks.json';
// prendo i contenuti nel file json
$json_data = file_get_contents($json_path);
// converto in array php per lavorarci e metto come secondo parametro TRUE perchè
// è un array associativo
$tasks = json_decode($json_data, true);
// una volta decodificato in php controllo se ho un nuovo task e lo pusho dentro al mio tasks[]
$task_text = $_POST['task'] ?? '';
if ($task_text){
    $new_task = [
        'done' => false,
        'text' => $task_text,
        'id' => uniqid()
    ]
    $tasks [] = $new_task;
    // trasformo i dati in json
    $tasks = json_encode($json_data, true);
    // e li pusho nel file .json
    file_put_contents($json_path, $tasks);
    $tasks = json_decode($json_data, true);
    // mi da sempre problemi con la politica cors
} 

// Invia la risposta in JSON
echo json_encode($tasks);