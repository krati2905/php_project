<?php
// session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InnerVerse 😌</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <h1 class="logo"><a href="home.php" class="logo">InnerVerse😌</a></h1>
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="nav-links">
                    <span>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
                    <a href="home.php" class="nav-link">Home</a>
                    <a href="profile.php" class="nav-link">Profile</a>
                    <a href="logout.php" class="nav-link">Logout</a>
                </div>
            <?php endif; ?>
        </div>
    </nav>