<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Vote</title>
</head>

<body>
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['candidate_id'])) {
    $candidate_id = $_POST['candidate_id'];

    // Database connection using mysqli
    $conn = new mysqli("localhost", "root", "", "uday");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape the candidate_id to prevent SQL injection
    $candidate_id = $conn->real_escape_string($candidate_id);

    // Check if the candidate already has a vote entry
    $sql = "SELECT * FROM candidate_votes WHERE candidate_id = '$candidate_id'";
    $result = $conn->query($sql);
    echo $candidate_id;
    if ($result && $result->num_rows > 0) {
        // Update the vote count
        $sql = "UPDATE candidate_votes SET votes = votes + 1 WHERE candidate_id = '$candidate_id'";
    } else {
        // Insert a new row
        $sql = "INSERT INTO candidate_votes (candidate_id, votes) VALUES ('$candidate_id', 1)";
    }

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Vote successfully recorded'); window.location.href='4box.php';</script>";
        $lid = $_SESSION['lid'];
        $qry = "UPDATE signup SET status='Done' WHERE id=$lid";
        $conn->query($qry);
    } else {
        echo "<script>alert('Failed to record vote'); window.location.href='candidates.php';</script>";
    }

    $conn->close();
} else {
    echo "<script>alert('Invalid request'); window.location.href='candidates.php';</script>";
}
?>

</body>
</html>
