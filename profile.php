<?php
require_once 'database/connect.php';
include 'includes/header.php';

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// 1. FETCH USER DATA
$stmt = $pdo->prepare("SELECT username, email FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user_data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user_data) {
    // Safety check: log out user if data not found
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<div class="auth-container">
    <div class="auth-box profile-card">

        <div class="profile-icon-section">
            <span class="profile-main-icon">👤</span>
        </div>

        <h2 class="profile-header">User Profile</h2>

        <h3 class="info-title">Personal Details</h3>
        <div class="info-grid">
            <div class="info-item">
                <strong>Username:</strong>
                <span><?php echo htmlspecialchars($user_data['username']); ?></span>
            </div>
            <div class="info-item">
                <strong>Email:</strong>
                <span><?php echo htmlspecialchars($user_data['email']); ?></span>
            </div>

        </div>

    </div>
</div>

<?php include 'includes/footer.php'; ?>