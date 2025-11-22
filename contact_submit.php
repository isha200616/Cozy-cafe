<?php
// public/api/contact_submit.php
require_once __DIR__ . '/../../src/db.php';
require_once __DIR__ . '/../../src/helpers.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit;
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');
$phone = trim($_POST['phone'] ?? '');

if (!$message || !$email) {
    flash_set('error', 'Please provide email and message.');
    header('Location: /#contact'); // adapt
    exit;
}

// store in DB
$stmt = $pdo->prepare("INSERT INTO contacts (name, email, phone, message) VALUES (?, ?, ?, ?)");
$stmt->execute([$name, $email, $phone, $message]);

// optionally send email using mail() or better: PHPMailer (not shown)
// mail($admin, "New contact", $message, "From: $email");

flash_set('success', 'Message sent — we will contact you soon.');
header('Location: /');
exit;
