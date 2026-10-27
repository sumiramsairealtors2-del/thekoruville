<?php
$file = __DIR__ . '/database/data/real-posts.json';
$data = json_decode(file_get_contents($file), true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo 'JSON Error: ' . json_last_error_msg() . PHP_EOL;
    exit(1);
}

if (!is_array($data) || count($data) === 0) {
    echo "JSON is valid, but no posts were found." . PHP_EOL;
    exit(1);
}

echo 'Valid JSON. Posts: ' . count($data) . PHP_EOL;

if (!isset($data[0]['title'], $data[0]['slug'], $data[0]['content'])) {
    echo "Warning: first post is missing title, slug, or content." . PHP_EOL;
    exit(1);
}

echo "First post has required fields." . PHP_EOL;
