<?php
// src/helpers.php
session_start();

function is_logged_in() {
    return !empty($_SESSION['user_id']);
}

function require_login() {
    if (!is_logged_in()) {
        header('Location: /auth/login.php');
        exit;
    }
}

function current_user($pdo = null) {
    if (!is_logged_in()) return null;
    if (!isset($_SESSION['user'])) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT id, name, email, role FROM users WHERE id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        $_SESSION['user'] = $stmt->fetch();
    }
    return $_SESSION['user'];
}

function is_admin() {
    return is_logged_in() && !empty($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
}

// Simple CSRF token helpers
function csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function csrf_check($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

function flash_set($key, $msg) {
    $_SESSION['flash'][$key] = $msg;
}

function flash_get($key) {
    if (isset($_SESSION['flash'][$key])) {
        $v = $_SESSION['flash'][$key];
        unset($_SESSION['flash'][$key]);
        return $v;
    }
    return null;
}
