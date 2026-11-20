<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Voters Login</title>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}
header {
    background-color: #4CAF50;
    color: white;
    text-align: center;
    padding: 1em 0;
}

nav {
    background-color: #333;
}

nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: center;
}

nav ul li {
    margin: 0 1em;
}

nav ul li a {
    color: white;
    text-decoration: none;
    padding: 0.5em 1em;
    display: block;
}

nav ul li a:hover {
    background-color: #575757;
}
/*css for login*/

.login-container {
    background-color: white;
	margin-top: 50px;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    width: 450px;
    text-align: center;
}
.form-container h2 { 
			margin-bottom: 20px; 
			color: #4CAF50; } 
		.form-container input[type="text"] { 
		width: calc(100% - 22px); 
		padding: 10px; 
		margin-bottom: 10px; 
		border: 1px solid #ccc; 
		border-radius: 5px; } 
		.form-container input[type="button"] { 
	    padding: 10px 20px; 
		background-color: #4CAF50; 
		color: white; 
		border: none; 
		border-radius: 5px; 
		cursor: pointer; 
		transition: background-color 0.3s ease; } 
	.form-container input[type="button"]:hover {
	    background-color: #45a049; }
	.form-container input[type="submit"] { 
	    padding: 10px 20px; 
		background-color: #4CAF50; 
		color: white; 
		border: none; 
		border-radius: 5px; 
		cursor: pointer; 
		transition: background-color 0.3s ease; } 
	.form-container input[type="submit"]:hover {
	    background-color: #45a049; }
</style>
</head>
<body>
<header>
<?php
session_start();
$id=$_SESSION['lid'];

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uday";

// Connect to MySQL using mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch Eid data from the edetails table
$sql = "SELECT Eid FROM edetails";
$result = $conn->query($sql);
?>
    <h1>ONLINE COLLEGE VOTING SYSTEM</h1>
    <marquee><p>(College Name)</p></marquee>
    </header>
    <nav>
        <ul>
            <li><a href="4box.php">Home</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="news.php">News</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="logout.php">Log-out</a></li>
        </ul>
    </nav>
    <center>
        <div class="login-container">
            <h2>Result Publish</h2>
            <form action="result.php" method="post">
                <div class="form-container">
                    <label for="eid_dropdown">Choose an Election ID:
                    <select name="eid_dropdown" id="eid_dropdown"></label>
                        <?php
                        // Check if there are any results
                        if ($result->num_rows > 0) {
                            // Loop through the results and create option elements
                            while($row = $result->fetch_assoc()) {
                                echo "<option value='" . htmlspecialchars($row['Eid']) . "'>" . htmlspecialchars($row['Eid']) . "</option>";
                            }
                        } else {
                            echo "<option value=''>No items found</option>";
                        }
                        ?>
                    </select>
					<br />
					<br />
                    <input type="submit" name="btn" value="OK">
                </div>
            </form>
        </div>

    </center>
</body>
</html>
<?php
$conn->close();
?>