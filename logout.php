<?php
require_once __DIR__ . '/../../src/helpers.php';
session_start();
$_SESSION = [];
session_destroy();
header('Location: /');
exit;
