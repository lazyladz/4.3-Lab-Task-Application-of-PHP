<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_GET['user'] ?? null;

if ($user_id != $_SESSION['user']['id']) {
    echo "Invalid user profile.";
    exit();
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark">
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-secondary text-white">Profile Page</div>
        <div class="card-body">
            <h4>Welcome, <?= htmlspecialchars($user['name']); ?>!</h4>
            <p><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></p>
            <p><strong>User ID:</strong> <?= $user['id']; ?></p>
            <a href="logout.php" class="btn btn-outline-secondary">Logout</a>
        </div>
    </div>
</div>
</body>
</html>
