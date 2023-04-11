<?php
function generateStrongPassword($length = 12)
{
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_+=~[]{}';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[mt_rand(0, strlen($chars) - 1)];
    }
    return $password;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $length = isset($_GET['length']) ? (int)$_GET['length'] : 12;
    $password = generateStrongPassword($length);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Strong Password Generator</title>
</head>
<body>
    <h1>Strong Password Generator</h1>
    <?php if (isset($password)) : ?>
        <p>Your password is: <strong><?php echo htmlentities($password); ?></strong></p>
    <?php endif; ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
        <label for="length">Password length:</label>
        <input type="number" id="length" name="length" value="<?php echo $length; ?>" min="6" max="64" required>
        <button type="submit">Generate</button>
    </form>
</body>
</html>