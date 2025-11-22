<?php
require_once __DIR__ . '/../../src/db.php';
require_once __DIR__ . '/../../src/helpers.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';

    if (!$name || !$email || !$password) {
        flash_set('error', 'Please fill all fields.');
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        flash_set('error', 'Invalid email.');
    } elseif ($password !== $confirm) {
        flash_set('error', 'Passwords do not match.');
    } else {
        // Check existing
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            flash_set('error', 'Email already registered.');
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password_hash) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $hash]);
            flash_set('success', 'Account created. Please login.');
            header('Location: /auth/login.php');
            exit;
        }
    }
}

// show minimal HTML form (or redirect back to your modal)
?>
<!doctype html><html><body>
<?php if ($m = flash_get('error')): ?><p style="color:red"><?=htmlspecialchars($m)?></p><?php endif; ?>
<form method="post">
  <input name="name" placeholder="Full Name" required><br>
  <input name="email" placeholder="Email" type="email" required><br>
  <input name="password" placeholder="Password" type="password" required><br>
  <input name="confirm_password" placeholder="Confirm Password" type="password" required><br>
  <button type="submit">Register</button>
</form>
</body></html>
