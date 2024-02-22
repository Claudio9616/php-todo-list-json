<?php
// individuo il path del JSON
// $json_path = __DIR__ . '/../data/tasks.json';
// prendo i suoi contenuti
// $jason_data = file_get_contents($json_path)
// $tasks = $jason_data
$tasks = [
    'id' => '1',
    'text' => 'HTML',
    'done' => 'false'
];
header('Content-Type: application/json');
echo json_encode($tasks);