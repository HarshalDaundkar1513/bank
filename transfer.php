<?php
// Database connection parameters
$conn = new mysqli("localhost", "root", "", "sdb");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the form
$from_account_name = $_POST['from_account'];
$to_account_name = $_POST['to_account'];
$amount = $_POST['amount'];

// Perform the transfer
$sqlTransfer = "INSERT INTO transactions (sender_name, receiver_name, amount, timestamp) VALUES ('$from_account_name', '$to_account_name', $amount, CURRENT_TIMESTAMP)";
if ($conn->query($sqlTransfer) === TRUE) {
    echo "Transaction recorded successfully.";
} else {
    echo "Error: " . $sqlTransfer . "<br>" . $conn->error;
}

// Update the sender's account balance
$sqlUpdateSender = "UPDATE accounts SET balance = balance - $amount WHERE name = '$from_account_name'";
if ($conn->query($sqlUpdateSender) === TRUE) {
    echo "Sender's account updated successfully.";
} else {
    echo "Error: " . $sqlUpdateSender . "<br>" . $conn->error;
}

// Update the receiver's account balance
$sqlUpdateReceiver = "UPDATE accounts SET balance = balance + $amount WHERE name = '$to_account_name'";
if ($conn->query($sqlUpdateReceiver) === TRUE) {
    echo "Receiver's account updated successfully.";
} else {
    echo "Error: " . $sqlUpdateReceiver . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();

// Redirect to view_transactions.php
header("Location: view_transactions.php");
exit();
?>
