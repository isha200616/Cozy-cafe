<?php
require_once __DIR__ . '/../../src/db.php';
require_once __DIR__ . '/../../src/helpers.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!$email || !$password) {
        flash_set('error', 'Missing credentials.');
    } else {
        $stmt = $pdo->prepare("SELECT id, password_hash, role, name FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $u = $stmt->fetch();
        if ($u && password_verify($password, $u['password_hash'])) {
            // login
            session_regenerate_id(true);
            $_SESSION['user_id'] = $u['id'];
            $_SESSION['user_role'] = $u['role'];
            $_SESSION['user_name'] = $u['name'];
            flash_set('success', 'Welcome back!');
            header('Location: /');
            exit;
        } else {
            flash_set('error', 'Invalid email or password.');
        }
    }
}
?>
<!doctype html><html><body>
<?php if ($m = flash_get('error')): ?><p style="color:red"><?=htmlspecialchars($m)?></p><?php endif; ?>
<form method="post">
  <input name="email" placeholder="Email" type="email" required><br>
  <input name="password" placeholder="Password" type="password" required><br>
  <button type="submit">Sign In</button>
</form>
</body></html>
