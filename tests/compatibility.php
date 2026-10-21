<?php
require __DIR__ . '/../Linkbucks.php';

$client = new Linkbucks();
$client->setOriginalLink('https://example.test/article');
$data = $client->getDataAccount();
if ($client->getOriginalLink() !== 'https://example.test/article'
    || $client->data['originalLink'] !== 'https://example.test/article'
    || $data['originalLink'] !== 'https://example.test/article'
    || $data['adType'] !== 2 || $data['contentType'] !== 1
    || $client->url !== 'https://www.linkbucks.com/api/createLink/single') {
    throw new RuntimeException('Link construction contract changed.');
}
echo "Link payload compatibility passed; no API request sent.\n";
