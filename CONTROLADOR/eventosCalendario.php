<?php
header('Content-Type: application/json');

// Aquí debes obtener los eventos desde tu base de datos
$events = [
    [
        'title' => 'Evento 1',
        'start' => '2024-06-15T10:00:00',
        'end' => '2024-06-15T12:00:00'
    ],
    [
        'title' => 'Evento 2',
        'start' => '2024-06-16T14:00:00',
        'end' => '2024-06-16T16:00:00'
    ]
];

echo json_encode($events);

