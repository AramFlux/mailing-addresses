<?php
require_once 'routes.php';

$url = parse_url($_SERVER['REQUEST_URI'])['path'];

if (!in_array($url, array_keys(Routes::ROUTES))) {
    if ($_SERVER["REQUEST_METHOD"] == 'GET') {
        header('Location: /');
    } else {
        header("HTTP/1.1 404");
        echo json_encode(['error' => 1, 'message' => 'Endpoint not found']);
    }

    exit;

    // Todo: implement 404 not found page for this implementation
}