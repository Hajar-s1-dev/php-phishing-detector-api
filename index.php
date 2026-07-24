<?php

header("Content-Type: application/json");
//connect to the PhishingDetector class
require_once 'PhishingDetector.php';

//we must ensure that the request is a POST request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Seules les requêtes POST sont autorisées']);
    exit;
}

//first we gonna read the input data from the request body, which is expected to be in JSON format.
// We decode it into an associative array.
//second we gonna extract the email and URL from the input data.
// If they are not provided, we set them to null.
$input = json_decode(file_get_contents('php://input'), true);
$email = $input['email'] ?? null;
$url = $input['url'] ?? null;

//third we gonna check if the email and URL are provided. If not, we return an error message and exit.
if (!$email || !$url) {
    echo json_encode(['error' => 'Paramètres manquants : email et url sont obligatoires']);
    exit;
}


$detector = new PhishingDetector();
$result = $detector->analyzeUrl($url);

echo json_encode([
    'status' => 'success',
    'requested_by' => $email,
    'analysis' => $result
], JSON_PRETTY_PRINT);
?>