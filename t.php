<?php
// Database connection parameters
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'sdb';

// Create a database connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the form
$sender_name = $_POST['sender'];
$receiver_name = $_POST['receiver'];
$amount = $_POST['amount'];

// Check if the amount is greater than 0
if ($amount <= 0) {
    // Display an alert and redirect to the home page
    echo "<script>alert('Invalid amount. Please enter an amount greater than 0.');</script>";
    echo "<script>window.location.href = 'index.php';</script>";
    exit();
}

// Check if the receiver's account exists
$checkReceiverQuery = "SELECT 1 FROM transactions WHERE receiver_name = ?";
$stmtCheckReceiver = $conn->prepare($checkReceiverQuery);

if ($stmtCheckReceiver === false) {
    die('Error: ' . $conn->error);
}

$stmtCheckReceiver->bind_param("s", $receiver_name);
$stmtCheckReceiver->execute();
$stmtCheckReceiver->store_result();
$receiverExists = $stmtCheckReceiver->num_rows > 0;
$stmtCheckReceiver->close();

// Perform the transfer if the receiver exists
if ($receiverExists) {
    // Perform the transfer
    $sql = "INSERT INTO transactions (sender_name, receiver_name, amount) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('Error: ' . $conn->error);
    }

    $stmt->bind_param("ssd", $sender_name, $receiver_name, $amount);
    $result = $stmt->execute();

    if ($result === false) {
        die('Error: ' . $stmt->error);
    }

    $stmt->close();

    // Update the balances in the transactions table
    $sql = "UPDATE transactions SET amount = amount - ? WHERE sender_name = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('Error: ' . $conn->error);
    }

    $stmt->bind_param("ds", $amount, $sender_name);
    $result = $stmt->execute();

    if ($result === false) {
        die('Error: ' . $stmt->error);
    }

    $stmt->close();

    $sql = "UPDATE transactions SET amount = amount + ? WHERE receiver_name = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('Error: ' . $conn->error);
    }

    $stmt->bind_param("ds", $amount, $receiver_name);
    $result = $stmt->execute();

    if ($result === false) {
        die('Error: ' . $stmt->error);
    }

    $stmt->close();

    // Close the database connection
    $conn->close();

    // Redirect to view_transactions.php
    header("Location: view_transactions.php");
    exit();
} else {
    // Cancel the transaction and display an alert
    echo "<script>alert('Invalid receiver data. Please check the receiver\'s account.');</script>";
    echo "<script>window.location.href = 'index.php';</script>";
    exit();
}
?>
