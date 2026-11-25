<?php
declare(strict_types=1);

header('Content-Type: text/html; charset=UTF-8');

function escapeHtml(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
