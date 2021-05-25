<?php

if (PHP_SAPI !== 'cli') exit;

if (empty($argv[2])) {
    exit("Usage: php $argv[0] <Bot Token> <Base URL>\nExample: php $argv[0] 1833467655:XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX https://bot.example.com/foo/bar/");
}

file_put_contents('bot_token', $argv[1]);

$webhook_url = rtrim($argv[2], '/') . '/webhook.php?key=' . md5($argv[1]);

echo file_get_contents("https://api.telegram.org/bot$argv[1]/setWebhook?url=" . urlencode($webhook_url));

