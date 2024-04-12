<?php
// Database connection and query handling for 'test' table
include 'db_connect.php';  // Assuming you have a db_connect.php file for connecting to the database

$name = '';
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    try {
        $sql = 'SELECT name FROM test WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $_POST['id']]);
        $result = $stmt->fetch();
        if ($result) {
            $name = $result['name'];
        } else {
            $errorMessage = 'No name found for the provided ID.';
        }
    } catch (\PDOException $e) {
        error_log($e->getMessage());
        $errorMessage = 'Failed to connect to the database.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query Test Table</title>
    <link rel="stylesheet" href="css/styles.css"/>

</head>
<body>
    <h1>Professor query</h1>
    <form method="post">
        <label for="id">Enter SSN:</label>
        <input type="text" id="id" name="id" required>
        <button type="submit">Submit</button>
    </form>

    <?php if ($name): ?>
        <p>Name: <?php echo htmlspecialchars($name); ?></p>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <p class="error"><?php echo $errorMessage; ?></p>
    <?php endif; ?>

    <a href="index.php">Back to portal</a>
</body>
</html>
