<?php

use Dotenv\Dotenv;
use GuzzleHttp\Client;

require __DIR__ . "/../../vendor/autoload.php";

$dotenv = Dotenv::createImmutable(__DIR__ . "/../../app/config/");
$dotenv->load();

$apiKey = $_ENV['GEMINI_API_KEY'] ?? null;
if (!$apiKey) {
    die("API key tidak ditemukan!\n");
}

$client = new Client([
    'base_uri' => 'https://generativelanguage.googleapis.com/v1beta/',
    'headers' => [
        'Content-Type' => 'application/json',
    ]
]);

$userMessage = $_REQUEST['message'];


try {
    $response = $client->post("models/gemini-2.0-flash:generateContent", [
        'query' => ['key' => $apiKey], // API Key di query param
        'json' => [
            'contents' => [
                [
                    'parts' => [
                        ['text' => "$userMessage"]
                    ]
                ]
            ]
        ]
    ]);

    $result = json_decode($response->getBody(), true);
    $aiReply = $result['candidates'][0]['content']['parts'][0]['text'] ?? '(Tidak ada balasan)';

    echo json_encode([
        "reply" => $aiReply
    ]);


} catch (\Exception $e) {
    echo json_encode([
        "error" => $e->getMessage()
    ]);
}