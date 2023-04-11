<?php require_once 'functions.php'; ?>

<?php
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