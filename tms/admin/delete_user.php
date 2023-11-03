<?php
session_start();
include('includes/config.php');

if (strlen($_SESSION['alogin']) == 0 || !isset($_GET['id'])) {
    header('location:index.php');
    exit();
}

$userID = $_GET['id'];

// Perform the delete operation
$sql = "DELETE FROM tblusers WHERE id = :userID";
$query = $dbh->prepare($sql);
$query->bindParam(':userID', $userID, PDO::PARAM_INT);

if ($query->execute()) {
    // User deleted successfully
    header('location:manage-users.php');
    exit();
} else {
    // Handle the error
    echo "Failed to delete user.";
}
?>